<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Token;
use App\Models\Current_access;
use App\Models\Session as sess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mail;
use App\Mail\WelcomeMail;
use App\Http\Controllers\ImageController;
use Cookie,Session;
use App\Jobs\SaveAccessToken;
class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'email|required',
                'password' => 'required'
            ]);

            $credentials = request(['email', 'password']);

            if (!Auth::attempt($credentials)) {
                return view('login')->with([
                    'status_code' => 500,
                    'message' => 'Unauthorized'
                ]);
            }

            $user = User::where('email', $request->email)->first();
                // return response()->json($user);
            if (!Hash::check($request->password, $user->password, [])) {
                throw new \Exception('Error in Login');
            }
            $tokenResult=\DB::table('personal_access_tokens')
            ->where('tokenable_id', $user->id)
            ->delete();
            $tokenResult = $user->createToken('authToken')->plainTextToken;
            $user->update(['remember_token'=>$tokenResult]);
            Current_access::create([
                'user_id'=>$user->id,
                'token'=>$tokenResult,
            ]);
            return redirect()->route('home');
        } catch (\Exception $error) {
            return response()->json([
                'status_code' => 500,
                'message' => 'Error in Login',
                'error' => $error,
            ]);
        }
    }
    public function showHome(Request $request)
    {
        // while(sess::where('user_id',null)!=null)
        // {
        //     sess::where('user_id',null)->firstOrFail()->delete();
        // }
        $obj=new ImageController;
        $pagedata=$obj->index();
        $pagedata=json_encode($pagedata);
        $pagedata=json_decode($pagedata);
        $access=Current_access::all()->first();
        if($access!="")
        {
            $user=User::find($access->user_id);
            Current_access::truncate();
            $tokenResult=$user->remember_token;
            $Authorization='Bearer '. $tokenResult;
            // return $Authorization;
            return response()->view('homepage',['pagedata'=>$pagedata,'Authorization'=>$Authorization,'user'=>$user]);
        }
        
        if(isset(auth('sanctum')->user()->id)) $user = User::find(auth('sanctum')->user()->id);
        return response()->view('homepage',['pagedata'=>$pagedata]);
    }
}

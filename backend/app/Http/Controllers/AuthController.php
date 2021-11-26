<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Token;
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
        // try {
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
            $job=(new SaveAccessToken($user))->delay(now()->addMinutes(10));
            dispatch($job);
            return redirect()->route('home');
        // } catch (\Exception $error) {
        //     return response()->json([
        //         'status_code' => 500,
        //         'message' => 'Error in Login',
        //         'error' => $error,
        //     ]);
        // }
    }
    public function showHome(Request $request)
    {
        $obj=new ImageController;
        $pagedata=$obj->index();
        $pagedata=json_encode($pagedata);
        $pagedata=json_decode($pagedata);
        $session=sess::where('ip_address',$request->ip())->where('user_id','!=',null)->first();
        if($session!="")
        {
            $tokenResult=\DB::table('personal_access_tokens')
            ->where('tokenable_id', $session->user_id)
            ->first();
            $user=User::find($session->user_id);
            sess::truncate();
            $tokenResult=json_encode($tokenResult);
            $tokenResult=json_decode($tokenResult);
            $Authorization='Bearer '. $tokenResult->token;
            return response()->view('homepage',['pagedata'=>$pagedata,'Authorization'=>$Authorization,'user'=>$user]);
        }
        
        if(isset(auth('sanctum')->user()->id)) $user = User::find(auth('sanctum')->user()->id);
        return response()->view('homepage',['pagedata'=>$pagedata]);
    }
}

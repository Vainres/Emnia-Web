<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mail;
use App\Mail\WelcomeMail;
use App\Http\Controllers\ImageController;
use Cookie;
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
            $tokenResult = $user->createToken('authToken')->plainTextToken;
            $cookie=cookie('Authorization','Bearer '. $tokenResult,60);
            $request->session()->put('Authorization','Bearer '. $tokenResult);
            $request->headers->set('Authorization', 'Bearer '. $tokenResult);
            // Cookie::queue(Cookie::make('Authorization','Bearer '. $tokenResult,60));
            // return response()->json(['status_code' => 500])->withCookie($cookie);
            return redirect()->route('home')->with(['Authorization'=>'Bearer '. $tokenResult]);
        // } catch (\Exception $error) {
        //     return response()->json([
        //         'status_code' => 500,
        //         'message' => 'Error in Login',
        //         'error' => $error,
        //     ]);
        // }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Current_access;
use App\Http\Controllers\ImageController;
use App\Jobs\SaveAccessToken;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Socialite, Auth, Redirect, Session, URL;
class SocialAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }   
    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        return User::create([
            'name'     => $user->name,
            'email'    => $user->email,
            'provider' => $provider,
            'provider_id' => $user->id,
            'password' => $user->token,
            'active' => true,
            'email_verified_at' => now(),
            'avatar'=>$user->avatar,

        ]);
    }
    public function handleProviderCallback($provider)
    {
        Socialite::driver($provider)->stateless();
        $raw_user = Socialite::driver($provider)->user();
        //  return $raw_user->getAvatar();
        $user=$this->findOrCreateUser($raw_user,$provider);
        $tokenResult = $user->createToken('authToken')->plainTextToken;
        $user->update(['remember_token'=>$tokenResult]);
        Current_access::create([
            'user_id'=>$user->id,
            'token'=>$tokenResult,
        ]);
        return redirect('https://emnia.test/');
    }

    
}

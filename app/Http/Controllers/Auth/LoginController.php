<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\User;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
     
    |
    */
    /**
       * @param  \Illuminate\Http\Request  $request
    **/


    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    // FACEBOOK
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }
    
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
        } catch (Exception $e) {
            return redirect('auth/facebook');
        }
        
        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        //return redirect()->route('inicio');
        //return redirect('/inicio');
        return redirect('http://localhost:8000'); 
    }
    // -- Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback()
    {
        try {
            // --  esta linha esta a ir buscar toda a nossa informaçãod a google 
            $user = Socialite::driver('google')->user();
        } catch (Exception $e) {
            return redirect('auth/google');
        }

        $authUser = $this->findOrCreateUser($user);
        
        Auth::login($authUser, true);
        return redirect('http://localhost:8000'); 
    }

    // -- Twitter
    public function redirectToTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }


    public function handleTwitterCallback()
    {
        try {
            // --  esta linha esta a ir buscar toda a nossa informaçãod a google 
            $user = Socialite::driver('twitter')->user();
        } catch (Exception $e) {
            return redirect('auth/twitter');
        }

        $authUser = $this->findOrCreateUser($user);
        
        Auth::login($authUser, true);
        return redirect('http://localhost:8000'); 
    }


    private function findOrCreateUser($socialUser)
    {
        $authUser = User::where('social_id', $socialUser->id)->first();

        if ($authUser){
            return $authUser;
        }else{
            return User::create([
                'name' => $socialUser->name,
                'email' => $socialUser->email,
                'social_id' => $socialUser->id,
                'password' => md5(rand(1,10000)),
                'avatar' => $socialUser->avatar
            ]);
        }
    }




}
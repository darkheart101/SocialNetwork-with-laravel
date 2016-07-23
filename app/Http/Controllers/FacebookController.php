<?php

namespace App\Http\Controllers;
use App\User;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Socialite;

class FacebookController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        // $user->token;
        //dd($user);
        $email = $user->getEmail();
        $first_name = $user->getName();
        $password = bcrypt($user->getId());
        
        $userLocal = new User();
        $userLocal->email = $email;
        $userLocal->first_name = $first_name;
        $userLocal->password = $password;
        
        //$userLocal->remember_token = session(['key' => 'value']);
        $userLocal->save();
        Auth::login($userLocal);
        //return redirect()->route('dashboard');
        //return redirect()->view('dashboard');
        //return Redirect::to('dashboard');
        return redirect('dashboard');
        /*
        echo $user->getId();

        echo $user->getNickname();
        echo $user->getName();
        echo $user->getEmail();
        echo $user->getAvatar();
        
        return redirect()->route('dashboard');
        */
    }
}
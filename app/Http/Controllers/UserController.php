<?php
namespace App\Http\Controllers;

use App\User;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

    
class UserController extends Controller{
    
    public function getDashboard(){
        if(Auth::user()){
            $posts = Post::orderBy('id', 'DESC')->get();
            return view('dashboard', ['posts' => $posts]);
        }else{
            return view('welcome');
        }
    }
    
    public function userLogout(Request $request){
        Auth::logout();
        return redirect('/');
    }

    public function postSignUp(Request $request){

         $this->validate($request, [
            'email'=> 'email|unique:users|required',
            'first_name' => 'required|max:120',
            'password'=> 'required|min:4'
        ]);
        
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $email = $request['email'];
        $password = bcrypt($request['password']);
        $birthday = $request['birthday'];
        $sex = $request['sex'];



        $user = new User();
        $user->first_name = $first_name;
        $user->last_name = $last_name;
        $user->email = $email;
        $user->password = $password;
        $user->birthday = $birthday;
        $user->sex = $sex;

        $user->save();
        Auth::login($user);
        //return redirect()->route('dashboard');
        //return redirect()->view('dashboard');
        //return Redirect::to('dashboard');
        return redirect('dashboard');
        
    }
    
    public function postSignIn(Request $request){
        $errorMessage = "Wrong Username or Password!";
        $authArgs = [
            'email' => $request['email'],
            'password' => $request['password']
        ];
        if(Auth::attempt($authArgs)){
            return redirect()->route('dashboard');
        }else{
            return redirect()->back()->with(['message' => 'Wrong Username or Password']);    
        }
        
    }
    
}
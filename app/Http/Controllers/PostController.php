<?php
namespace App\Http\Controllers;

use App\User;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

    
class PostController extends Controller{
    
    public function postStatus(Request $request){
        if(Auth::user()){
            $post = new Post();
            $post->body = $request['status'];
            $request->user()->posts()->save($post);

            //Auth::login($user);
            return redirect('dashboard');
        }else{
            return redirect('/');    
        }

    }
    
}
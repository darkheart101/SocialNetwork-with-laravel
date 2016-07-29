<?php
namespace App\Http\Controllers;

use App\User;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

    
class PostController extends Controller{
    
    public function postStatus(Request $request){
         $this->validate($request, [
            'status'=> 'required'
        ]);

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

    public function editStatus(Request $request){
        $this->validate($request, [
            'editstatus'=> 'required'
        ]);
        $id = $request['postide'];
        if(Auth::user()){
            $post =Post::where('id',$id)->first();
            $post->body = $request['editstatus'];
            $request->user()->posts()->save($post);

            //Auth::login($user);
            return redirect('dashboard');
        }else{
            return redirect('/');    
        }

    }

    public function deleteStatus(Request $request,$id){


        if(Auth::user()){
            //$post = \DB::table('posts')->where('id',$id)->first();
            $post =Post::where('id',$id)->first();
            $post->delete();
            return redirect('dashboard')->with(['message' => 'Message Deleted!']);    
        }else{
            return redirect('/');    
        }

    }    
    
}
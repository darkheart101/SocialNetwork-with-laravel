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
        $status = $request['status'];

        if(Auth::user()){
            $post = new Post();
            
            if (strlen(strstr($status, 'https://www.youtube.com/watch?'))>0){
                $video_id = explode("?v=", $status); // For videos like http://www.youtube.com/watch?v=...
                if (empty($video_id[1]))
                    $video_id = explode("/v/", $status); // For videos like http://www.youtube.com/watch/v/..

                $video_id = explode("&", $video_id[1]); // Deleting any other params
                $status = 'https://www.youtube.com/embed/'.$video_id[0];
            }

            $post->body = $status;
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
            $post =Post::where('id',$id)->first();
            $post->delete();
            return redirect('dashboard')->with(['message' => 'Message Deleted!']);    
        }else{
            return redirect('/');    
        }

    }    
    
}
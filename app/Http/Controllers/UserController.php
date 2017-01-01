<?php
namespace App\Http\Controllers;

use App\User;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;



    
class UserController extends Controller{
    
    public function getDashboard(){
        if(Auth::user()){
            $posts = Post::orderBy('id', 'DESC')->get();
            return view('dashboard', ['posts' => $posts]);
        }else{
            return view('welcome');
        }
    }

    public function getUser($id){

        $info = array();

        //$user = User::where('id',$id)->first();
        $user = DB::table('users')->where('id',$id)->first();
        //$post = Post::where('user_id',$id);
        $info['user'] = $user;

        $posts = DB::table('posts')->where('user_id',$id)->get();
        
        $info['posts'] = $posts;

        return view('userprofile', ['info' => $info ] );
        /*
        echo "<pre>";
        print_r($user);
        echo "</pre>";
        exit();
        */
    }
    
    public function userLogout(Request $request){
        Auth::logout();
        return redirect('/');
    }

    public function postSignUp(Request $request){

         $this->validate($request, [
            'email'=> 'email|unique:users|required',
            'first_name' => 'required|max:120',
            'last_name' => 'required|max:120',
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

    public function editYourProfile(Request $request){

        $this->validate($request, [
            'first_name' => 'max:120',
            'last_name' => 'max:120'
        ]);
        /*$user = new User();
        
        $user->first_name = $first_name;
        $user->update();
        */
        $id = $request['userid'];
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $sex = $request['sex'];
        $profile_picture = $request->file('profile-picture');

        
        $user = new User();

        if(!empty($first_name)) {
            $user::where('id', $id)
            ->update(['first_name' => $first_name]);
        }

        if(!empty($last_name)) {
            $user::where('id', $id)
            ->update(['last_name' => $last_name]);
        }
        
        if(!empty($sex)) {
            $user::where('id', $id)
            ->update(['sex' => $sex]);
        }
        
        if($profile_picture){
            echo "Success!!!";
            $filename = $id . time().'.'.'jpg'; 
            $user::where('id', $id)
            ->update(['profile_picture' => $filename]);
            Storage::disk('local')->put($filename,File::get($profile_picture));
            
            /*$filename = $id . time().'.'.'jpg'; 
            Storage::disk('local')->put($filename,File::get($profile_picture));
            //$rules = array('image' => 'required',);
            //$destinationPath = '/img/'. $id; 
            //$extension = Input::file('profile-picture')->getClientOriginalExtension();
            //$fileName = $id . time().'.'.$extension;
            //Input::file('profile-picture')->move($destinationPath, $fileName);
            //Session::flash('success', 'Upload successfully'); 
            $user::where('id', $id)
            ->update(['profile_picture' => ]);
            
            */
        }

        return redirect('profile');
        
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
    
    public function getUserImage($filename){

        $file = Storage::disk('local')->get($filename);
        return new Response($file,200);
    }
    
}
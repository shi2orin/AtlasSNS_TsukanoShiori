<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Post;
use App\Http\Requests\RegisterFormRequest;


class UsersController extends Controller
{
    public function profile(){
        $user = Auth::user();
        return view('users.profile',compact('user'));
    }

    public function profileEdit(RegisterFormRequest $request){

        $id = $request->input('id');
        $username =$request->input('username');
        $mail = $request->input('mail');
        $password = $request->input('password');
        $passwordConfirm = $request->input('passwordConfirm');
        $bio = $request->input('bio');

        $fileName = $request->file('images')->getClientOriginalName();
        $request->file('images')->storeAs('public/images/',$fileName);
        // 画像パスを保存する

        $images = 'storage/images/'.$fileName;


        User::where('id', $id)->update([
              'username' =>$username,
              'mail' => $mail,
              'password' => bcrypt($password),
              'bio' => $bio,
              'images' => $images

        ]);
        return redirect('index');
    }
     public function list()
    {
        $users = User::all();
        return view('users.search',compact('users'));
    }


    public function search(Request $request){
        $keyword = $request ->input('keyword');
        if(!empty($keyword)){
             $users = User::where('username','like', '%'.$keyword.'%')->get();
        }else{
             $users = User::all();
        }
        return view('users.search',compact('users','keyword'));
    }

    // 他ユーザープロフィール
    public function userProfile($id){

    // そのIDのユーザーを$userに
    $user = User::where('id',$id)->first();
    // その$userのポストのみ表示
    $posts = Post::where('user_id',$id)->get();

    return view('users.userprofile',compact('user','posts'));
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \App\User;

class UsersController extends Controller
{
    public function profile(){
        $user = Auth::user();
        return view('users.profile',compact('user'));
    }

    public function profileEdit(Request $request){

        $id = $request->input('id');
        $username =$request->input('username');
        $mail = $request->input('mail');
        $password = $request->input('password');
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
        // 3つ目の処理
        return redirect('/profile');
    }


    public function search(){
        return view('users.search');
    }
}

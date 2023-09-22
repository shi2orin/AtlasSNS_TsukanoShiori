<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Auth;
use App\Follow;

class FollowsController extends Controller
{
    //
    public function follow($userId)
    {
        Auth::user()->follows()->attach($userId);
        return redirect('/index');
    }
    // フォロー登録して投稿に戻る

        public function unfollow($userId)
    {
        Auth::user()->follows()->detach($userId);
        return redirect('/index');
    }
    // フォロー解除、ボタン未実装




    public function followList(){

        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }
}

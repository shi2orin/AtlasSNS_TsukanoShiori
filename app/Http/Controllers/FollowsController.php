<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Follows;

class FollowsController extends Controller
{
    //

    // フォロー・フォロワー数カウント
public function following(){
  $followings = Follows::where('following_id', Auth::id())->get();
  return view('auth.login', compact('followings'));
}
// フォロー数＝following_idにある自分のidの数

public function followed(){
  $followeds = Follows::where('followed_id', Auth::id())->get();
  return view('auth.login', compact('followeds'));
}



    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }
}

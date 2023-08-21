<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Post;


class PostsController extends Controller
{
    public function index(){
        return view('posts.index');
    }

    //投稿を読み込む
    public function showPosts(){
         $posts = Post::latest()->get();  // <--- 追加
        return view('posts.index', compact('posts'));
    }

// 　　投稿を登録する
   public function postTweet(Request $request)
{
    $validator = $request->validate([
        'post' => ['required', 'string', 'max:150'],
    ]);

    // 投稿を作成
    Post::create([
        'user_id' => Auth::user()->id,
        'post' => $request->post,
    ]);
}
}

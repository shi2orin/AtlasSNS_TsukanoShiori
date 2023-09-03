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
         $id = Auth::id();
        return view('posts.index', compact('posts','id'));
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
    return redirect('/index');
}

  public function postEdit(Request $request)
 {
    $validator = $request->validate([
        'editPost' => ['required', 'string', 'max:150'],
    ]);
    $id = $request ->input('editId');
    $post =$request ->input('editPost');

    Post::where('id',$id)->update([
        'post' =>$post
    ]);
     return redirect('/index');
}

 public function postDelete($id)
 {
  Post::where('id', $id)->delete();
  return redirect('/index');
 }

// showアクションにボタン表示のid識別入れた、フォロー機能つけてから動作確認

}

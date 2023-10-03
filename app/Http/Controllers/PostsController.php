<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use \App\Post;



class PostsController extends Controller
{

    public function index(){
        return view('posts.index');
    }

    public function showPosts(){

    $id = Auth::id();
    $following_id = Auth::user()->follows()->pluck('followed_id')->push($id);

    $posts = Post::with('user')->whereIn('user_id', $following_id)->latest()->get();

    return view('posts.index', compact('posts','id'));
    }


// 　　投稿を登録する
   public function postTweet(Request $request){
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

    public function postEdit(Request $request){
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

    // フォローリスト
    public function followPosts(){
    // フォローしているユーザーのidを取得、ログインユーザーIDがfollowingカラムにある=そのデータのfollowedのIDをフォローしている
    $following_id = Auth::user()->follows()->pluck('followed_id');
    // フォローしているユーザーのidを元に投稿内容を取得
    $posts = Post::with('user')->whereIn('user_id', $following_id)->get();
    $users = User::whereIn('id', $following_id)->get();
    //   判定したいテーブル名.カラム名,期待される値
    // postテーブルのuser_idカラムが$following_idと同じ->抽出

    return view('follows.followList', compact('posts','users'));
    }

    public function followerPosts(){

    $followed_id = Auth::user()->follower()->pluck('following_id');

    $posts = Post::with('user')->whereIn('user_id', $followed_id)->get();
    $users = User::whereIn('id', $followed_id)->get();

    return view('follows.followerList', compact('posts','users'));
    }
}

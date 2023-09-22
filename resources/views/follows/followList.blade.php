@extends('layouts.login')

@section('content')

<div class="follow-list">

<!-- フォロー・フォロワーどちらも同じ表示の仕方 -->
  <p>Follow List</p>
  <!-- アイコンと横並び -->
  <div class ="follow-icon">
  @foreach($users as $user)

  <a class="userprofile" href="/user/{{$user->id}}/profile"><img src="{{ asset($user->images) }}">
  @endforeach
</div>

</div>

<ul class="post-wrapper">
  <!-- フォローしている人の投稿を表示 -->
  @foreach($posts as $post)
  <li class="post-block">
    <img src ="{{ asset($post->user->images)}}" class="postimg">
    <div class="post-content">
      <div>
        <div class="post-name">{{ $post->user->username }}</div>
        <div>{{ $post->created_at }}</div>
      </div>

      <div class="post-text">{{ $post->post }}</div>
    </div>
  </li>

@endforeach
</ul>




@endsection

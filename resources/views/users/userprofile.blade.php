@extends('layouts.login')

@section('content')

<div class="user-profile">
  <img src="{{asset($user->images)}}">
  <table class="user-bio">
  <tr>
    <td>name</td>
    <td>{{$user->username}}</td>
  </tr>
  <tr>
    <td>bio</td>
    <td>{{$user->bio}}</td>
  </tr>
</table>
@if ($user->id !== Auth::user()->id)
        @if (auth()->user()->isFollowing($user->id))
          <form method="POST" action="/unfollow/{{ $user->id }}">
            @csrf
            <button type="submit">フォロー解除</button>
          </form>
        @else
          <form method="POST" action="/follow/{{ $user->id }}">
            @csrf
            <button type="submit">フォローする</button>
          </form>
        @endif
 @endif
</div>

<!-- ユーザーのプロフィール表示 -->

<ul class ="post-wrapper">
  @foreach($posts as $post)
    <li class ="post-block">
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

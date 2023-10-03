@extends('layouts.login')

@section('content')

<div class="follow-list">
  <p>Follow List</p>
  <div class ="follow-icon">
    @foreach($users as $user)

    <a href="/user/{{$user->id}}/profile"><img src="{{ asset($user->images) }}" class="icon"></a>
    @endforeach
  </div>
</div>

<ul class="post-wrapper">
  @foreach($posts as $post)
  <li class="post-block">
    <img src ="{{ asset($post->user->images)}}" class="icon">
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

@extends('layouts.login')

@section('content')

<h2>機能を実装していきましょう。</h2>

<div class ="postForm">
  <form action="/index" method="post">
    {{ csrf_field() }}
    <input type="text" name="post" placeholder="今どうしてる？">
    <button type="submit">
      <img src="{{ asset('/images/post.png') }}">
    </button>
  </form>
</div>

<div class ="post-wrapper">

 @foreach($posts as $post)
<div>{{ $post->post }}</div>
@endforeach
</div>
@endsection

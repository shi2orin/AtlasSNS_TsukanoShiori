@extends('layouts.login')

@section('content')


<div class ="postForm">
  <form action="/index" method="post">
    {{ csrf_field() }}
    <textarea id="post" name="text" cols="100" rows="4" placeholder="投稿内容を入力してください"></textarea>
    <button type="submit">
      <img src="{{ asset('/images/post.png') }}" class="postimg">
    </button>
  </form>
</div>

<ul class ="post-wrapper">
  @foreach($posts as $post)
    <li class ="post-block">
      <img src ="{{ asset('images/icon1.png')}}" class="postimg">
        <div class="post-content">
        <!-- Redmine確認し画像のみ -->
        <!-- 名前記載なし、紐づけ必要 -->
          <div>
            <div class="post-name">username</div>
            <div>{{ $post->created_at }}</div>
          </div>
          <div class="post-text">{{ $post->post }}</div>
        </div>
          @if ($id ==$post->user_id)
          <div class="post-update">
            <a class="js-modal-open" href="/index" post="{{ $post->post }}" post_id="{{ $post->id }}"> <img src="{{ asset('/images/edit.png') }}" class="postimg inPost"></a></p>
            <a class="post-delete" href="/post/{{$post->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')"> <img src="{{ asset('images/trash.png') }}" class="postimg inPost" onmouseover="this.src='{{ asset('images/trash-h.png') }}'" onmouseout="this.src='{{ asset('images/trash.png') }}'"></a>
          </div>
          @endif
    </li>
    <div>


  <!-- 横並びはCSSで調整する方がいいかも -->
<div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
           <form action="/post/edit" method="post">
                <textarea name="editPost" class="modal_post"></textarea>
                <input type="hidden" name="editId" class="modal_id" value="">
                <button type="submit"><img src="{{ asset('/images/edit.png') }}" class="postimg inPost"></button>
                {{ csrf_field() }}
           </form>
           <a class="js-modal-close" href="/index">閉じる</a>
        </div>
    </div>

@endforeach
</ul>
@endsection

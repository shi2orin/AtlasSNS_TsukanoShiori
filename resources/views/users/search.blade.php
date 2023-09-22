@extends('layouts.login')

@section('content')

<div class ="search">
  <form action="/searching" method="post">
        @csrf
        <input type="text" name="keyword" class="searchForm" placeholder="ユーザー名">
        <button type="submit" ><img src="{{ asset('/images/search.png') }}" class="searchbtn"></button>
    </form>

@if(!empty($keyword))
  <div class ="search-word">
  <!-- 検索したワードを表示 -->
検索ワード:{{$keyword}}
</div>
@else
 <div class ="search-word"></div>
@endif


</div>

<table class="search-list">
  <!-- 検索前は全員表示、検索後は該当したユーザーの表示 -->
  @foreach($users as $user)
  @if ($user->id !== Auth::user()->id)
    <tr>
      <td><img src="{{ asset($user->images) }}" class="search-icon"></td>
      <td>{{$user->username}}</td>
      <td>
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
      </td>
    </tr>
  @endforeach
</table>



@endsection

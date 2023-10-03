@extends('layouts.logout')

<section class="login-section">
@section('content')
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/register']) !!}

<div class="login-wrapper">

<p>新規ユーザー登録</p>

  <div class="login-form">
  {{ Form::label('ユーザー名') }}
  {{ Form::text('username',null,['class' => 'input']) }}
  </div>

  <div class="login-form">
  {{ Form::label('メールアドレス') }}
  {{ Form::text('mail',null,['class' => 'input']) }}
  </div>

  <div class="login-form">
  {{ Form::label('パスワード') }}
  {{Form::input('password','password')}}

  </div>

  <div class="login-form">
  {{ Form::label('パスワード確認') }}
  {{Form::input('password','passwordConfirm')}}
  </div>

  <div class="text-end">
  <button type="submit" class="btn btn-danger">登録</button>
  </div>

<p class="login-register"><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}
</div>

</section>


@endsection

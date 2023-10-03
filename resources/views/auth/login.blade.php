@extends('layouts.logout')

<section class="login-section">
@section('content')
{!! Form::open(['url' => '/login']) !!}


<div class="login-wrapper">
  <p >AtlasSNSへようこそ</p>

  <div class="login-form">

  {{ Form::label('e-mail') }}
  {{ Form::text('mail',null,['class' => 'input']) }}
  </div>
  <div class="login-form">
  {{ Form::label('password') }}
  {{ Form::password('password',['class' => 'input']) }}
  </div>

  <div class="text-end">
  <button type="submit" class="btn btn-danger">ログイン</button>
  </div>

<p class="login-register"><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}
</div>


</section>

@endsection

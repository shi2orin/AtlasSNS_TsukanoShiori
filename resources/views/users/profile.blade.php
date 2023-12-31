@extends('layouts.login')

@section('content')
<section id="contents">

{!! Form::open(['url' => '/profileEdit','files' => true]) !!}
{{Form::token()}}
{{ Form::hidden('id',$user->id) }}
<div class="profile">
  <img src="{{ asset($user->images) }}"class="icon">

  <!-- ログインユーザーのアイコンになってしまう -->

  <table class ="profile-list">
    <tr>
    <td>{{ Form::label('username') }}</td>
    <td>{{ Form::input('text','username',$user->username) }}</td>
    </tr>
      <tr>
    <td>{{ Form::label('mail address') }}</td>
    <td>{{Form::input('text','mail',$user->mail)}}</td>
    </tr>
      <tr>
    <td>{{ Form::label('password') }}</td>
    <td>{{Form::input('password','password')}}</td>
    </tr>
      <tr>
    <td>{{ Form::label('password confirm') }}</td>
    <td>{{Form::input('password','passwordConfirm')}}</td>
    </tr>
      <tr>
    <td>{{ Form::label('bio') }}</td>
    <td>{{Form::input('textarea','bio',$user->bio)}}</td>
    </tr>
      <tr>
    <td>{{ Form::label('icon image') }}</td>
    <td>{{Form::input('file','images')}}</td>
    </tr>
  </table>
</div>

<div class="text-center">
<button type="submit" class="btn btn-danger">更新</button>
</div>
{!!Form::close()!!}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</section>
@endsection

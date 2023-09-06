@extends('layouts.login')

@section('content')

{!! Form::open(['url' => '/profile','files' => true]) !!}
{{Form::token()}}
{{ Form::hidden('id',$user->id) }}
<div class="profile">
<img src="{{ asset($user->images) }}"class="profile-icon">

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
  <td>{{Form::input('password','password')}}</td>
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
<div class="profile-update">{{Form::submit('更新')}}</div>
{!!Form::close()!!}
</div>

@endsection

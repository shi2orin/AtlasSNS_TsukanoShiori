@extends('layouts.login')

@section('content')

<table class ="profile-list">
  <tr>
  <td><label>user name</label></td>
  <td><input type="text" name="username" class="profile-form" value=""></td>
  </tr>
    <tr>
  <td><label>mail adress</label></td>
  <td><input type="text" name="username" class="profile-form" value=""></td>
  </tr>
    <tr>
  <td><label>password</label></td>
  <td><input type="text" name="username" class="profile-form" value=""></td>
  </tr>
    <tr>
  <td><label>password comfirm</label></td>
  <td><input type="text" name="username" class="profile-form" value=""></td>
  </tr>
    <tr>
  <td><label>bio</label></td>
  <td><input type="text" name="username" class="profile-form" value=""></td>
  </tr>
    <tr>
  <td><label>icon image</label></td>
  <td><input type="text" name="username" class="profile-form" value=""></td>
  </tr>
</table>

<!-- {!! Form::open(['url' => '/book/update']) !!}
        <div class="form-group">
            {{ Form::hidden('id', $book->id) }}
            {{ Form::label('本のタイトル') }}
            {{ Form::input('text', 'upTitle', $book->title, ['required', 'class' => 'form-control']) }}
            {{ Form::label('本の金額') }}
            {{ Form::input('text', 'upPrice', $book->price, ['required', 'class' => 'form-control']) }}
        </div>
        <button type="submit" class="btn btn-primary pull-right">更新</button>
        {!! Form::close() !!} -->



@endsection

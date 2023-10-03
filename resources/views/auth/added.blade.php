@extends('layouts.logout')
<section class="login-section">

@section('content')

  <div id="clear">
    <p>{{ session('username') }}さん</p>
    <p>ようこそ！AtlasSNSへ！</p>
    <p>ユーザー登録が完了しました。</p>
    <p>早速ログインをしてみましょう。</p>
    <div class="text-center">
    <button type="button" class="btn btn-danger"><a href="/login">ログイン画面へ</a></button>
    </div>
  </div>

</section>
@endsection

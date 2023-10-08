<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="SNS課題" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
<header>
    <div class ="header-wrap">
        <div id = "head">
        <h1><a href ='/index'><img src="{{ asset('/images/atlas.png') }}" class="headimg" ></a></h1>
        </div>


  <!-- アコーディオンメニュー -->
  <nav class="ac">
        <div class ="ac-label">
            <p>{{Auth::user()->username}}さん</p>
            <div class="arrow-wrap"><span class="arrow"></span></div>
            <img src="{{ asset(Auth::user()->images) }}" class="icon">
        </div>

        <div class="ac-content">
            <ul>
                <li><a href="/index">ホーム</a></li>
                <li><a href="/profile">プロフィール</a></li>
                <li><a href="/logout">ログアウト</a></li>
            </ul>
        </div>
  </nav>

</header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <section id="side-bar">
            <div class="confirm">
                <p class="side-follow">{{Auth::user()->username}}さんの</p>
                <div class="side-follow">
                    <p>フォロー数&emsp;{{ Auth::user()->follows()->get()->count() }}人</p>
                    <div class="text-end">
                    <a type="button" class="btn btn-primary side-btn" href="/follow-list">フォローリスト</a>
                    </div>
                </div>
                <div class="side-follow">
                    <p>フォロワー数&emsp;{{ Auth::user()->follower()->get()->count() }}人</p>
                    <div class="text-end">
                    <a type="button" class="btn btn-primary side-btn" href="/follower-list">フォロワーリスト</a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="text-center">
            <a type="button" class="btn btn-primary user-search side-btn" href="/search">ユーザー検索</a>
            </div>
        </section>
    </div>
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>

</body>
</html>

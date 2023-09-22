<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
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
  <div class="ac">
    <div class ="ac-label">
        <p>{{Auth::user()->username}}さん</p>
        <div class="arrow-wrap"><span class="arrow"></span></div>
           <img src="{{ asset(Auth::user()->images) }}" class="ac-icon">
    </div>

    <div class="ac-content">
        <ul class="ac-lists">
            <li class="ac-lists"><a href="/index">ホーム</a></li>
            <li class="ac-lists"><a href="/profile">プロフィール</a></li>
            <li class="ac-lists"><a href="/logout">ログアウト</a></li>
        </ul>
    </div>
  </div>

    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>{{Auth::user()->username}}さんの</p>
                <div>
                <p>フォロー数</p>
                {{ Auth::user()->follows()->get()->count() }}
                </div>
                <p class="btn"><a href="/follow-list">フォローリスト</a></p>
                <div>
                <p>フォロワー数</p>
                {{ Auth::user()->follower()->get()->count() }}
                <!-- フォロワー表示できない -->
                <!-- user.phpにフォロー確認のコード追記 -->


                </div>
                <p class="btn"><a href="/follower-list">フォロワーリスト</a></p>
            </div>
            <p class="btn"><a href="/search">ユーザー検索</a></p>
        </div>
    </div>
    <!-- a hoverでアコーディオンリストを作っているためフォローリストにも反映されている -->
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>

</body>
</html>

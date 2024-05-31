
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/stores') }}">
            {{ config('app.name', 'NAGOYAMESHI') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">ログイン</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">登録</a>
                        </li>
                    @endif
                @else
                    <a href="{{route('mypage') }}">
                        マイページ
                    </a>
                    <a href="{{route('favorite.index') }}">
                        お気に入り
                    </a>
                    <a href="{{route('reservation.index') }}">
                        予約履歴
                    </a>
                @endguest
            </ul>
        </div>
    </div>
</nav>
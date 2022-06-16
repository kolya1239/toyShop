<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Index</title>
</head>

<body class="container-fluid">
    <div class="row mh-100vh align-items-start">
        <header class="row col-md-12 m-0">
            <ul class="nav nav-pills p-3">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('index') }}">Главная</a>
                </li>
                <li class="nav-item ms-auto">
                    <a class="nav-link" href="{{ route('contactGet') }}">Связь с нами</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">О нас</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('getCart') }}">Корзина</a>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" v-pre>
                        @if (Auth::check())
                            {{ Auth::user()->name }}
                        @else
                            Админ панель
                        @endif
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        @if (Auth::check())
                            <a class="dropdown-item" href="{{ route('home') }}">Админ панель</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Выйти') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @else
                            <a class="dropdown-item" href="{{ route('login') }}">Войти</a>
                            <a class="dropdown-item" href="{{ route('register') }}">Регистрация</a>
                        @endif
                    </div>
                </li>

                <li class="nav-item">
                    <form class="d-flex" action="{{ route('search') }}" method="GET">
                        @csrf
                        <input class="form-control me-2" type="search" placeholder="Плюшевый" name="search" aria-label="Search" maxlength="60" minlength="1">
                        <button class="btn btn-outline-success" type="submit">Искать</button>
                    </form>
                </li>
            </ul>
        </header>

        @yield('content')

        <footer class="row justify-content-around bg-primary pt-3 pb-2 mt-3 col-md-12 m-0 align-self-end">
            <div class="col-md-3 text-light m-0">
                <h4 class="h4 text-light mt-1 mb-1">Наши номера</h4>
                <p class="text-light mt-1 mb-1">8-800-535-35-35</p>
                <p class="text-light mt-1 mb-1">8-800-535-35-35</p>
                <p class="text-light mt-1 mb-1">8-800-535-35-35</p>
            </div>
            <div class="col-md-3 text-light m-0">
                <h4 class="h4 text-light mt-1 mb-1">Наши филиалы</h4>
                <p class="text-light mt-1 mb-1">г. Безымянный, ул. Неизвестная, д. 1</p>
                <p class="text-light mt-1 mb-1">г. Безымянный, ул. Неизвестная, д. 2</p>
                <p class="text-light mt-1 mb-1">г. Безымянный, ул. Неизвестная, д. 3</p>
            </div>
            <div class="col-md-2 row justify-content-center">
                <h4 class="h4 text-light mt-1 mb-0">Мы в соцсетях</h4>
                <div class="d-flex justify-content-between">
                    <a href="#" class="text-light mt-1 mb-1"><img class="icons__image" src="../image/dribble_icon.svg" alt=""></a>
                    <a href="#" class="text-light mt-1 mb-1"><img class="icons__image" src="../image/facebook_icon.svg" alt=""></a>
                    <a href="#" class="text-light mt-1 mb-1"><img class="icons__image" src="../image/twitter_icon.svg" alt=""></a>
                </div>
            </div>
        </footer>
    </div>

    <script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>

</body>

</html>

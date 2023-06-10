<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

@yield('header')


<!-- Scripts -->
    <script src="{{'site/js/jquery-3.4.1.min.js'}}"></script>
    <script src="{{'site/js/bootstrap.bundle.min.js'}}"></script>
    <script src="{{'site/js/bootstrap-select.min.js'}}"></script>
    <script src="{{'site/js/owl.carousel.min.js'}}"></script>
    <script src="{{'site/js/isotope.js'}}"></script>
    <script src="{{'site/js/waypoint.min.js'}}"></script>
    <script src="{{'site/js/jquery.counterup.min.js'}}"></script>
    <script src="{{'site/js/fancybox.js'}}"></script>
    <script src="{{'site/js/datedropper.min.js'}}"></script>
    <script src="{{'site/js/emojionearea.min.js'}}"></script>
    <script src="{{'site/js/tooltipster.bundle.min.js'}}"></script>
    <script src="{{'site/js/jquery.lazy.min.js'}}"></script>
    <script src="{{'site/js/main.js'}}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{'site/css/bootstrap.min.css'}}">
    <link rel="stylesheet" href="{{'site/css/line-awesome.css'}}">
    <link rel="stylesheet" href="{{'site/css/owl.carousel.min.css'}}">
    <link rel="stylesheet" href="{{'site/css/owl.theme.default.min.css'}}">
    <link rel="stylesheet" href="{{'site/css/bootstrap-select.min.css'}}">
    <link rel="stylesheet" href="{{'site/css/fancybox.css'}}">
    <link rel="stylesheet" href="{{'site/css/tooltipster.bundle.css'}}">
    <link rel="stylesheet" href="{{'site/css/style.css'}}">
</head>
<body>
@yield('content')

{{--    <div id="app">--}}
{{--        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">--}}
{{--            <div class="container">--}}
{{--                <a class="navbar-brand" href="{{ url('/') }}">--}}
{{--                    {{ config('app.name', 'Laravel') }}--}}
{{--                </a>--}}
{{--                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
{{--                    <span class="navbar-toggler-icon"></span>--}}
{{--                </button>--}}

{{--                <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--                    <!-- Left Side Of Navbar -->--}}
{{--                    <ul class="navbar-nav me-auto">--}}

{{--                    </ul>--}}

{{--                    <!-- Right Side Of Navbar -->--}}
{{--                    <ul class="navbar-nav ms-auto">--}}
{{--                        <!-- Authentication Links -->--}}
{{--                        @guest--}}
{{--                            @if (Route::has('login'))--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}

{{--                            @if (Route::has('register'))--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}
{{--                        @else--}}
{{--                            <li class="nav-item dropdown">--}}
{{--                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                    {{ Auth::user()->name }}--}}
{{--                                </a>--}}

{{--                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">--}}
{{--                                    <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                       onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                        {{ __('Logout') }}--}}
{{--                                    </a>--}}

{{--                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                                        @csrf--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        @endguest--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </nav>--}}

{{--        <main class="py-4">--}}
{{--            @yield('content')--}}
{{--        </main>--}}
{{--    </div>--}}
</body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/navcss.css') }}" rel="stylesheet">
</head>

<body id="page-top">
      <!--Navigation-->
      <nav id="mainNav" class="navbar navbar-expand-lg navbar-dark fixed-top">
       <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="{{ url('/') }}">1조 홈페이지</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu
            <i class="fas fa-bars"></i>
        </button>        
        <div class="navbar-collapse collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#mainNav">조원소개</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="{{route('japan.index')}}">현지학기제</a>
                </li>                
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#mainNav">Q&amp;A</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a id="nav-link" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <!-- <div class="nav-item" aria-labelledby="navbarDropdown"> -->
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <!-- </div> -->
                    </li>
                @endguest
            </ul>
        </div>
      </div>
    </nav>
    <main class="py-4">
            @yield('content')
    </main>
</body>
</html>

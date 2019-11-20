<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>1조</title>
    <link rel="stylesheet" href="{{ asset('css/navcss.css') }}">
    <link rel="stylesheet" href="{{ asset('css/headercss.css') }}">
    <link href="{{ asset('css/servcss.css') }}" rel="stylesheet">
</head>
<body id="page-top">
      <!--Navigation-->
      <nav id="mainNav" class="navbar navbar-expand-lg navbar-dark fixed-top">
       <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">1조 홈페이지</a>
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
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
<!--
                <li class="nav-item auth">
                    <a class="nav-link js-scroll-trigger" href="{{route('login')}}">로그인/로그아웃</a>
                </li>                
-->
            </ul>
        </div>
      </div>
    </nav>
    
<!--Header-->
   <header class="masthead">
       <div class="container">
           <div class="intro-text">
               <div class="intro-lead-in">나베 먹고 싶다....</div>
               <div class="intro-heading text-uppercase">반갑습니다</div>
               <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Tell Me More</a>
           </div>
       </div>
   </header>   
<!--services-->
   <section class="page-section" id="services">
       <div class="container">
           <div class="row">
               <div class="col-lg-12 text-center">
                   <h2 class="section-heading text-uppercase">Services</h2>
                   <h3 class="section-subheading text-muted">아래의 서비스를 제공합니다.</h3>
               </div>
           </div>
           <div class="row text-center">
               <div class="col-md-4">
<!--
                   <span class="fa-stack fa-4x">
                       <i class="fas fa-circle fa-stack-2x text-primary">
                          
                       </i>
                       <i class="fas fa-shopping-cart fa-stack-1x fa-inverse">
                           
                       </i>
                   </span>
-->
                  <hr>
                   <h4 class="service-heading">
                       조원 소개
                   </h4>
                   <p class="text-muted">
                       이름을 하나씩 제목으로 지금의 p태그에 받으면 됩니다
                   </p>
               </div>
               <div class="col-md-4">
                   <span class="fa-stack fa-4x">
                       <i class="fas fa-circle fa-stack-2x text-primary">
                           
                       </i>
                       <i class="fas fa-laptop fa-stack-1x fa-inverse">
                           
                       </i>
                   </span>
                   <hr>
                   <h4 class="service-heading"><a href="{{route('japan.index')}}">현지학기제</a></h4>
                   <p class="text-muted">
                       현지학기제 소제목을 p태그로 받으면 됩니다.
                   </p>
               </div>
               <div class="col-md-4">
                   <span class="fa-stack fa-4x">
                       <i class="fas fa-lock fa-stack-2x text-primary">
                           
                       </i>
                       <i class="fas fa-lcok fa-stack-1x fa-inverse">
                           
                       </i>
                   </span>
                   <hr>
                   <h4 class="service-heading">
                       Q&amp;A게시판
                   </h4>
                   <p class="text-muted">
                       게시판 제목을 p태그로 받습니다.
                   </p>
               </div>
           </div>
       </div>
   </section>
</body>
</html>
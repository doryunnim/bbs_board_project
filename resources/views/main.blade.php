@extends('layouts.app')

@section('content')
<div class="container">
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
                    <hr>
                    <h4 class="service-heading"><a href="{{route('introduces.index')}}">조원소개</a></h4>
                    @if(!@empty($introduces))
                        @forelse($introduces as $introduce)
                            <p>{{ $introduce -> name }}</p>
                        @empty
                            <p>글이 없습니다.</p>
                        @endforelse
                    @else   
                        <p class="text-center text-danger">로그인이 필요합니다. <p>
                    @endif
                    
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
                    @if(!@empty($japans))
                        @forelse($japans as $japan)
                            <p>{{ $japan -> title }}</p>
                        @empty
                            <p>글이 없습니다.</p>
                        @endforelse
                    @else
                        <p>로그인이 필요합니다.</p>
                    @endif
                    
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
                    @if(!empty($qnaArticles))
                        @forelse($qnaArticles as $qnaArticle)
                            <p>{{ $qnaArticle -> title }}</p>
                        @empty
                            <p>글이 없습니다.</p>
                        @endforelse
                    @else
                        <p>로그인이 필요합니다.</p>
                    @endif
                    
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('script')
    <script>
        window.onscroll = function() {scrollFunction()};
            function scrollFunction() {
            if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 30) {
                document.getElementById("mainNav").style.paddingTop = "0rem";
                document.getElementsByClassName("navbar-brand").style.fontSize = "1.75em";
            } else {
                document.getElementById("mainNav").style.paddingTop = "1rem";          
                document.getElementsByClassName("navbar-brand").style.fontSize = "1.9em";
            }
        }
    </script>
@stop
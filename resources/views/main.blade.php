@extends('layouts.app')

@section('content')
<div class="container">
    <!--Header-->
    <header class="masthead">
        <div class="container">
            <div class="intro-text " >
                <div class="intro-lead-in">Welcome to Team 1 Homepage</div>
                <div class="intro-heading text-uppercase">Why don't you</div>
                <div class="intro-heading text-uppercase">do your best?</div>
            </div>
        </div>
    </header>

    <!--services-->
    <section class="page-section" id="services" data-aos="fade">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center" data-aos="fade">
                    <h2 class="section-heading text-uppercase">Services</h2>
                    <h3 class="section-subheading text-muted">아래의 서비스를 제공합니다.</h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4" data-aos="fade-down">
                    <hr>
                    <h4 class="service-heading"><a href="{{route('introduces.index')}}">조원소개</a></h4>
                    @if(!@empty($introduces))
                        @forelse($introduces as $introduce)
                            <a href="introduces/{{ $introduce -> id }}" class="show-id">
                                <p>{{ $introduce -> name }}</p>
                            </a>
                        @empty
                            <p>글이 없습니다.</p>
                        @endforelse
                    @else   
                        <p class="text-center text-danger">로그인이 필요합니다. <p>
                    @endif
                    
                </div>

                <div class="col-md-4" data-aos="fade-down">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary">
                        </i>
                        <i class="fas fa-laptop fa-stack-1x fa-inverse">
                        </i>
                    </span>
                    <hr>
                    <h4 class="service-heading"><a class="service-chart"href="{{route('japan.index')}}">현지학기제</a></h4>
                    @if(!@empty($japans))
                        @forelse($japans as $japan)    
                            <a href="{{route('japan.index')}}" onclick="japan();"class="show-id japan__show{{$japan->id}}" data-all="{{$japan}}" data-img="{{$japan->attachments}}">  
                                <p>{{ $japan -> title }}</p>
                            </a>
                        @empty
                            <p>글이 없습니다.</p>
                        @endforelse
                    @else
                        <p class="text-center text-danger">로그인이 필요합니다.</p>
                    @endif
                    
                </div>

                <div class="col-md-4" data-aos="fade-down">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-lock fa-stack-2x text-primary">
                        </i>
                        <i class="fas fa-lcok fa-stack-1x fa-inverse">
                        </i>
                    </span>
                    <hr>
                    <h4 class="service-heading"><a href="{{route('qnaArticles.index')}}">Q&amp;A게시판</a></h4>
                    @if(!empty($qnaArticles))
                        @forelse($qnaArticles as $qnaArticle)
                            <a href="qnaArticles/{{ $qnaArticle -> id }}" class="show-id">  
                                <p>{{ $qnaArticle -> title }}</p>
                            </a>
                        @empty
                            <p>글이 없습니다.</p>
                        @endforelse
                    @else
                        <p class="text-center text-danger">로그인이 필요합니다.</p>
                    @endif
                    
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('script')
    <script>
        AOS.init();
        window.onscroll = function() {scrollFunction()};
            function scrollFunction() {
            if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 30) {
                document.getElementById("mainNav").style.paddingTop = "0rem";
                document.getElementById("mainNav").style.paddingBottom = "0rem";
                document.getElementsByClassName("navbar-brand").style.fontSize = "28px";
            } else {
                document.getElementById("mainNav").style.paddingTop = "1rem";  
                document.getElementById("mainNav").style.paddingBottom = "1rem";        
                document.getElementsByClassName("navbar-brand").style.fontSize = "30px";
            }
        }
    </script>
@stop
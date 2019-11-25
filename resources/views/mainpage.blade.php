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
                    <h4 class="service-heading"><a href="#">현지학기제</a></h4>
                    <p class="text-muted">
                        <p class="text-center text-danger">글이 없습니다.</p>
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
</div>
@endsection
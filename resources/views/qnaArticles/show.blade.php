@extends('layouts.app')
@section('content')
<link href="{{ asset('css/app2.css') }}" rel="stylesheet">
<link href="{{ asset('css/commentcss.css') }}" rel="stylesheet">
<style>
    .nav-3{
        border-bottom: 3px solid white;
    }
</style>
<div class="container">
    <div class="page-header">
        <h3>{{ $qnaArticle->title }}</h3>
    </div>

    <article data-id="{{ $qnaArticle->id }}">
        <p>{!! markdown($qnaArticle->content) !!}</p>
        <!-- <p>{{ $qnaArticle->content }}</p> -->
    </article>
    <div class="text-center action__article">
        @can('update', $qnaArticle)
            <a href="{{route('qnaArticles.edit', $qnaArticle->id)}}" class="btn btn-info">
                <i class="fa fa-pencil"></i> 수정
            </a>
        @endcan
        @can('delete', $qnaArticle)
            <button class="btn btn-danger button__delete">
                <i class="fa fa-trash-o"></i> 삭제
            </button>
        @endcan
        <a href="{{route('qnaArticles.index')}}" class="btn btn-info">
                <i class="fa fa-list"></i> 목록
            </a>
        </div>
        <div class="container__comment">
            @include('qnaComments.index')
        </div>
</div>

<!-- <aside class="side-bar">
    <div class="row">
        <div class="col">
            <a href="{{route('qnaArticles.create')}}" class="btn btn-primary m-b">글 쓰기</a>
        </div>
    </div>
</aside> -->
@stop
@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.button__delete').on('click', function(e){
            var articleId = $('article').data('id');

            if(confirm('글을 삭제합니다.')){
                $.ajax({
                    type: 'DELETE',
                    url: '/qnaArticles/' + articleId
                }).then(function(){
                    window.location.href = '/qnaArticles';
                });
            }
        }); 
    </script>
@stop

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-header">
        <h3>현지학기제</h3>
    </div>

<!--  aside로 옮김
    <div class="text-right">
        <a href="{{route('articles.create')}}" class="btn btn-primary">글 쓰기</a>
    </div>
    <article>
        @forelse($articles as $article)
            @include('articles.partial.article', compact('article'))
        @empty
            <p class="text-center text-danger">글이 없습니다.</p>
        @endforelse
    </article>
 -->

    @if($articles->count())
    <div class="text-center">
        {!! $articles->appends((Request::except('page')))->render() !!}
    </div>
    @endif
</div>
<div class="contain">
    <aside class="side-bar">
        <div class="row">
            <div class="col">
                <a href="{{route('articles.create')}}" class="btn btn-primary m-b">글 쓰기</a>
                @forelse($articles as $article)
                    @include('articles.partial.article', compact('article'))
                @empty
                    <p class="text-center text-danger">글이 없습니다.</p>
                @endforelse
            </div>
        </div>
    </aside>
    <div class="main-chart">
        <p>
            여기가 게시물드링 카드뷰처럼 나오는 곳입니다.





            ㅁㅁㅁ

            ㅁㅁㅁㅁㅁ

            ㅁㅁㅁ
            ㅁㅁㅁㅁㅁㅁ
            ㅁ
        </p>
    <div>
</div>
@stop
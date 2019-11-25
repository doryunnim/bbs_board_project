@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
        <h3>{{$qnaArticle->title}}</h3>
    </div>

    <article>
        <p>{!! markdown($qnaArticle->content) !!}</p>
    </article>

    <div class="text-center action__qnaArticle">
        <a href="{{route('qnaArticles.edit', $qnaArticle->id)}}" class="btn btn-info">
            글 수정
        </a>
        <button class="btn btn-danger button__delete">
            글 삭제
        </button>
        <a href="{{route('qnaArticles.index')}}" class="btn btn-info">
            글 목록
        </a>
    </div>
</div>

<aside class="side-bar">
    <div class="row">
        <div class="col">
            <a href="{{route('qnaArticles.create')}}" class="btn btn-primary m-b">글 쓰기</a>
            @forelse($qnaArticles as $qnaArticle)
                @include('qnaArticles.partial.qnaArticles', compact('qnaArticle'))
            @empty
            @endforelse
        </div>
    </div>
</aside>
@stop

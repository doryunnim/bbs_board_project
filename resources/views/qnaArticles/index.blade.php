@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-header">
        <h3>Q&A</h3>
    </div>

    @if($qnaArticles->count())
    <div class="text-center">
        {!! $qnaArticles->appends((Request::except('page')))->render() !!}
    </div>
    @endif
</div>

<aside class="side-bar">
    <div class="row">
        <div class="col">
            <a href="{{route('qnaArticles.create')}}" class="btn btn-primary m-b">글 쓰기</a>
            @forelse($qnaArticles as $qnaArticle)
                @include('qnaArticles.partial.qnaArticles', compact('qnaArticle'))
            @empty
                <p class="text-center text-danger">글이 없습니다.</p>
            @endforelse
        </div>
    </div>
</aside>
@stop
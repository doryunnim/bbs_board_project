@extends('layouts.app')

@section('content')

<div class="container">
    <div class="page-header">
        <h3>Q&A</h3>
    </div>
    <hr/>
    <ul>
        @forelse($qnaArticles as $article)
            @include('qnaArticles.partial.qnaArticle')
        <!-- <li>
            {{$article->title}}
            <small>
                by {{$article->user->name}}
            </small>
        </li> -->
    @empty
        <p>글이 없습니다.</p>
        @endforelse
    </ul>

    @if($qnaArticles->count())
    <!--원소가 있을 때만 페이지 이동 링크를 표시 -->
        <div class="text-center">
            <!-- {!! $qnaArticles->render() !!} -->
            {!! $qnaArticles->appends(Request::except('page'))->render() !!}
        </div>
    @endif
    <button type="button" class="btn btn-primary" onclick="location.href='{{ route('qnaArticles.create')}}'">ADD</button>
</div>


@stop
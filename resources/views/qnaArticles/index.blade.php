@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-header">
        <h3>Q&A</h3>
    </div>
    <hr/>
    <ul>
        @forelse($qnaArticles as $article)
        <li>
            {{$article->title}}
            <small>
                by {{$article->user->name}}
            </small>
        </li>
    @empty
        <p>글이 없습니다.</p>
    @endforelse
    </ul>

    @if($qnaArticles->count())
    <!--원소가 있을 때만 페이지 이동 링크를 표시 -->
        <div class="text-center">
            {!! $qnaArticles->render() !!}
        </div>
    @endif
    <a href="/qnaArticles/create">ADD</a>
</div>


@stop
@extends('layouts.app')

@section('content')
    <div class="page-header">
        <h3>글 목록</h3>
    </div>

    <div class="text-right">
        <a href="{{route('articles.create')}}" class="btn btn-primary">
            <i class="fa fa-plus-circle"></i> 글 쓰기
        </a>
    </div>

    <article>
        @forelse($articles as $article)
            @include('articles.partial.article', compact('article'))
        @empty
            <p class="text-center text-danger">글이 없습니다.</p>
        @endforelse
    </article>

    <!-- <div class="container">
        <h1>게시판 글 목록</h1>
        <hr>
        <ul>
            @forelse($articles as $article)
                <li>
                    <a href="{{ route('articles.create') }}">{{$article->title}}</a>
                </li>
            @empty
                <p>글이 없습니다</p>
            @endforelse
        </ul>
    </div> -->

    @if($articles->count())
    <div class="text-center">
        {!! $articles->appends((Request::except('page')))->render() !!}
    </div>
    @endif
@stop
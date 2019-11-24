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
        <div class="text-center">
            {!! $qnaArticles->render() !!}
        </div>
    @endif
</div>


@stop
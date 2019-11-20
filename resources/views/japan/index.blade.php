@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-header">
        <h3>현지학기제</h3>
    </div>

    @if($articles->count())
    <div class="text-center">
        {!! $articles->appends((Request::except('page')))->render() !!}
    </div>
    @endif
</div>

<aside class="side-bar">
    <div class="row">
        <div class="col">
            <a href="{{route('japan.create')}}" class="btn btn-primary m-b">글 쓰기</a>
            @forelse($articles as $japan)
                @include('japan.partial.article', compact('japan'))
            @empty
                <p class="text-center text-danger">글이 없습니다.</p>
            @endforelse
        </div>
    </div>
</aside>
@stop
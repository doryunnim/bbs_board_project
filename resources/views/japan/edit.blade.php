@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
        <h3>글 수정</h3>
    </div>

    <form action="{{route('japan.update', $japan->id)}}" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}
        {!! method_field('PUT') !!}
        @include('japan.partial.form')
        <div class="form-group">
            <button type="submit" class="btn btn-primary">수정</button>
        </div>
    </form>
</div>

<aside class="side-bar">
    <div class="row">
        <div class="col">
            <a href="{{route('japan.create')}}" class="btn btn-primary m-b">글 쓰기</a>
            @forelse($japans as $japan)
                @include('japan.partial.article', compact('japan'))
            @empty
                <p class="text-center text-danger">글이 없습니다.</p>
            @endforelse
        </div>
    </div>
</aside>
@stop
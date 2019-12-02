@extends('layouts.app')
@section('content')
<link href="{{ asset('css/japanform.css') }}" rel="stylesheet">
<link href="{{ asset('css/japan.css') }}" rel="stylesheet">
<link href="{{ asset('css/headercss.css') }}" rel="stylesheet">
<div class="container">
    <div class="page-header">
            <h3>새 글 쓰기</h3>
    </div>    
</div>
<div class="contains">
    <form action="{{ route('japan.store') }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        @include('japan.partial.form')
        <div class="form-group">
            <button type="submit" class="savebtn btn-primary">저장</button>
        </div>
    </form>
    <aside class="side-bar">
        <div class="row">
            <div class="col">
                <a href="{{route('japan.create')}}" class="btn btn-primary m-b">글 쓰기</a>
                @forelse($japans as $japan)
                    @include('japan.partial.article', compact('japan'))
                @empty
                    <p class="text-center text-danger">글이 없습니다.</p>
                @endforelse
            </div>
        </div>
    </aside>
</div>
@stop
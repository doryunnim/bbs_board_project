@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-header">
        <h3>현지학기제</h3>
    </div>
    <hr>
    <!-- 작성 글 보이게 할 div 태그 -->
    @forelse($japans as $japan)
        <div id="show" style="display:none">@include('japan.partial.show', compact('japan'))</div>
    @empty
        <p class="text-center text-danger">글이 없습니다.</p>
    @endforelse
</div>

<!-- 사이드 바 -->
<aside class="side-bar">
    <div class="row">
        <div class="col">
            <button class="btn btn-info m-b button__create"><img src="img/add.png"></button>
            @foreach($japans as $japan)
                @include('japan.partial.article', compact('japan'))
            @endforeach
        </div>
    </div>
</aside>
@stop

@section('script')
<script src="{{ asset('js/japan.js') }}" defer></script>
@stop
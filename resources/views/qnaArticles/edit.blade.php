@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
        <h3>글 수정</h3>
    </div>

    <form action="{{route('qnaArticles.update', $qnaArticle->id)}}" method="POST">
        {!! csrf_field() !!}
        {!! method_field('PUT') !!}
        @include('qnaArticles.partial.form')
    </form>
</div>
@stop
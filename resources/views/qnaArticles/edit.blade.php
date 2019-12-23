@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style>
.gray {
    color: #fff;
    background-color: #474747;
    border-color: #313131;
}
</style>
<div class="container">
    <div class="page-header">
        <h3>글 수정</h3>
    </div>

    <form action="{{route('qnaArticles.update', $qnaArticle->id)}}" method="POST">
        {!! csrf_field() !!}
        {!! method_field('PUT') !!}
        @include('qnaArticles.partial.form')
        <div class="form-group">
            <button type="submit" class="btn btn-primary gray">수정</button>
        </div>
    </form>
</div>
@stop
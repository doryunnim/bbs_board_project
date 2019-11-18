@extends('layouts.app')
@section('content')
    <div class="page-header">
        <h4>글 수정</h4>
    </div>

    <form action="{{route('articles.update', $article->id)}}" method="POST">
        {{!! csrf_field() !!}}
        {{!! method_field('PUT') !!}}
        @include('articles.partial.form')
        <div class="form-group">
            <buttonn ...>수정</buttonn>
        </div>
    </form>
@stop
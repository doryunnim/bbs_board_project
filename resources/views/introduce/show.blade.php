@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
        <h3>{{$introduce->title}}</h3>
    </div>
    <div class="text-center action__qnaArticle">
        <a href="{{route('introduces.edit', $qnaArticle->id)}}" class="btn btn-info">
            글 수정
        </a>
        <button class="btn btn-danger button__delete">
            글 삭제
        </button>
        <a href="{{route('introduces.index')}}" class="btn btn-info">
            글 목록
        </a>
    </div>
</div>
@stop

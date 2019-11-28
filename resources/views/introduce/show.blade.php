@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
        <h3>{{$introduce->title}}</h3>
    </div>
    <article data-id="{{ $introduce->id }}">
        <img src="{{ $introduce->url }}" class="img-fluid">
        <h4>{{ $introduce->name }}</h4>
        <p>{{ $introduce->comment }}</p>
    </article>
    <div class="text-center action__article">
        <a href="{{route('introduces.edit', $introduce->id)}}" class="btn btn-info">
            글 수정
        </a>
        <a href="{{route('introduces.destroy', $introduce->id)}}" class="btn btn-danger">
            글 삭제
        </a>
        <a href="{{route('introduces.index')}}" class="btn btn-info">
            뒤로가기
        </a>
    </div>
</div>
@stop
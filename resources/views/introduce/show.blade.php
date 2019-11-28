@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
        <h3>{{$introduce->title}}</h3>
    </div>
    <div class="#">
        <img src="{{ $introduce->url }}" class="img-fluid">
        <h4>{{ $introduce->name }}</h4>
        <p>{{ $introduce->comment }}</p>
    </div>
    <div class="text-center">
        <a href="{{route('introduces.edit', $introduce->id)}}" class="btn btn-info">
            글 수정
        </a>
        <a herf="{{route('introduces.destroy', $introduce->id)}}" class="btn btn-danger button__delete">
            글 삭제
        </a>
        <a href="{{route('introduces.index')}}" class="btn btn-info">
            뒤로가기
        </a>
    </div>
</div>
@stop

@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/japanform.css') }}">
<link rel="stylesheet" href="{{ asset('css/japan.css') }}">
<link rel="stylesheet" href="{{ asset('css/headercss.css') }}">
<div class="container">
    <div class="page-header">
            <h3>새 글 쓰기</h3>
    </div>    
</div>
<div class="contains">
    <form action="{{ route('japan.store') }}" method="POST" enctype="multipart/from-data">
        @csrf
        @include('japan.partial.form')
        <div class="form-group">
            <button type="submit" class="savebtn btn-primary">저장</button>
        </div>
    </form>
</div>
@stop
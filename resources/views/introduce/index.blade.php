@extends('layouts.app')

@section('content')
<br><br><br>
<div class="container">
    <div class="page-header">
        <h3>Introduce My teams</h3>
    </div>
    <hr>
    <div class="row">
        <!-- 조원 사진 & 추가 부분 -->
        @foreach($introduces as $introduce)
        <div class="col-md-1">
            <img src="{{ $introduce->url }}" class="img-fluid">
            <h4>{{ $introduce->name }}</h4>
        </div>
        @endforeach
        <a href="{{ route('introduces.create') }}">ADD</a>
    </div>
    <hr>
    <div>
        <h2>우리 조는 말이죠</h2>
    </div>
    <hr>
    <div class="row">
        @foreach($introduces as $introduce)
        <div class="col-md-6">
            <img src="{{ $introduce->url }}" class="img-fluid">
            <h4>{{ $introduce->name }}</h4>
            <h3>{{ $introduce->comment }}</h3>
        </div>
        @endforeach
    </div>

</div>
@endsection
@extends('layouts.app')

@section('content')
<link href="{{ asset('css/app2.css') }}" rel="stylesheet">
<style>
    .nav-1{
        border-bottom: 3px solid white;
    }
</style>
<div class="container">
    <div class="page-header">
        <h3>Introduce My teams</h3>
    </div>
    <hr>
    <div class="row">
        <!-- 조원 사진 & 추가 부분 -->
        @foreach($introduces as $introduce)
        <div class="col-md-2">
            <div class = "w3-container">
                <div class="w3-card" style="width:150px; height:150px">
                    <img src="{{ $introduce->url }}" alt="Person" style="width:150px; height:118px">
                    <div class = "w3-container"> 
                        <h4>{{ $introduce->name }}</h4>
                    </div>
                </div>
            </div>
            <br>
        </div>
        @endforeach
        <a href="{{ route('introduces.create') }}">ADD</a>
    </div>
    <div class="container" style="text-align:center">
        <h2>우리 조는 말이죠</h2>
        <h2>우리 조는 말이죠</h2>
        <h2>우리 조는 말이죠</h2>
        <h2>우리 조는 말이죠</h2>
        <hr>
    </div>
    <div class="row"> 
        @foreach($introduces as $introduce)
            @include('introduce.partial.introduce')
        @endforeach
    </div>
</div>
@endsection
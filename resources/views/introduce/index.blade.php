@extends('layouts.app')

@section('content')
<div class="container">
<<<<<<< HEAD
    <!-- 조원사진, 이름 part -->
    <div class="row">
        @php
            $photos = App\NabeIntroduce::all();
        @endphp
        @foreach($photos as $photo)
        <div class="col-md-4">
            <img src="{{ $photo->url }}" class="img-fluid">
            <h4>{{ $photo->name }}</h4>
        </div>
        @endforeach
        <a href="/introduce/create">ADD</a>
    </div>
    <br><hr>
    <!-- 조원 소개 detail part -->
    <div class="row">
        
    </div>

=======
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
>>>>>>> f773e4ceb2ae734a12587f5b4fccd8893328f718
</div>
@endsection
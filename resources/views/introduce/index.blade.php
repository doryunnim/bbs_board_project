@extends('layouts.app')

@section('content')
<br><br><br>
<div class="container">
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
    </div>
    <div>
        <ul class="bt-evnet">
            <a href="{{ route('introduces.create') }}">ADD</a>
        </ul>
    </div>
    <hr>
    <!-- 조원 소개 detail part -->
    <div class="#">
    <div class="event_button" id="eventResponsive">
        <ul class="bt-event">
            <a href="{{ route('introduces.create') }}">수정</a>
            <a href="{{ route('introduces.destroy') }}">삭제</a>
        </ul>
    </div>
    </div>
</div>
@endsection
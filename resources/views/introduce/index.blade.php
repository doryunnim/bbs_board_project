@extends('layouts.main')

@section('content')
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
        <a href="/introduce/create">ADD</a>
        <a href="/introduce/create">UPDATE</a>
        <a href="/introduce/create">DELETE</a>
    </div>
    <br><hr>
    <!-- 조원 소개 detail part -->
    <div class="row">
        
    </div>

</div>
@endsection
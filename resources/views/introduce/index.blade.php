@extends('layouts.app')

@section('content')
<div class="container">
    <!-- 조원 사진, 이름 나오는 부분 -->
    <div class="row">
        @php
            $photos = App\NabeIntroduce::all();
        @endphp
        @foreach($photos as $photo)
        <div class="col-md-4">
            <img src="{{ $photo->url }} " class="img-fluid">
            <h4>{{ $photo->name }}</h4>
        </div>
        @endforeach
        <a href="/introduce/create">ADD</a>
    </div>
    <br><hr>
    <!-- 조원 소개 디테일하게 나오는 부분 -->
    <div class="row">
        아몰라 내일함
    </div>

</div>
@endsection
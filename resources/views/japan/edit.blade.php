@extends('layouts.app')
@section('content')
<!-- styles -->
<link href="{{ asset('css/headercss.css') }}" rel="stylesheet">
<link href="{{ asset('css/japan.css') }}" rel="stylesheet">
<link href="{{ asset('css/japanform.css') }}" rel="stylesheet">


<div class="contain">
    <div class="page-header">
        <h3>글 수정</h3>
    </div>
</div>
<div class="contains">
    <div class="main-chart">
        <form action="{{route('japan.update', $japan->id)}}" method="POST" enctype="multipart/form-data">
            {!! csrf_field() !!}
            {!! method_field('PUT') !!}
            @include('japan.partial.form')
            <div class="form-group">
                <button type="submit" class="btn btn-primary">수정</button>
            </div>
        </form>
    </div>
</div>
</div>

@stop
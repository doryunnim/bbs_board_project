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

    <form action="{{route('japan.update', $japan->id)}}" id="updateJapan" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <!-- PUT 메서드를 위해 숨은 필드를 출력 이게 없으면 MethodNotAllowHttpException 에러 발생 -->
        {!! method_field('PUT') !!}
        <div class="form-group">
            @include('japan.partial.form')
            <button id="editJapan" class="btn btn-primary">수정</button>
        </div>
    </form>
</div>
@stop

@section('script')
<script src="{{ asset('js/japan.js') }}" defer></script>
@stop
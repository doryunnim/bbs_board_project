@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
        <h3>글 수정</h3>
    </div>

    <form id="updateJapan" method="PATCH" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <!-- PUT 메서드를 위해 숨은 필드를 출력 이게 없으면 MethodNotAllowHttpException 에러 발생 -->
        <!-- {!! method_field('PUT') !!} -->
        <div class="form-group">
            @include('japan.partial.form')
            <button id="updateJapan" class="btn btn-primary">수정</button>
        </div>
    </form>
</div>
@stop

@section('script')
<script src="{{ asset('js/japan.js') }}" defer></script>
@stop
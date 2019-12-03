@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-header">
        <h3>새 글 쓰기</h3>
    </div>
    
    <form action="{{ route('japan.store') }}" id="createJapan" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="form-group">
            @include('japan.partial.form')
            <button type="submit" id="saveBtn" class="btn btn-primary">저장</button>
        </div>
    </form>
</div>
@stop

@section('script')
<script src="{{ asset('js/app.js') }}" defer></script>
@stop
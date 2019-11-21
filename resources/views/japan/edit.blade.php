@extends('layouts.app')
@section('content')
<div class="container2">
    <div class="page-header">
        <h3>글 수정</h3>
    </div>

    <form action="{{route('japan.update', $japan->id)}}" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}
        {!! method_field('PUT') !!}
        @include('japan.partial.form')
        <div class="form-group">
            <button type="submit" class="btn btn-primary">수정</button>
        </div>
    </form>
</div>
@stop
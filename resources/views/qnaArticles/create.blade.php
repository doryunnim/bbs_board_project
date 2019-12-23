@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style>
.gray {
    color: #fff;
    background-color: #474747;
    border-color: #313131;
}
</style>
<div class="container">
    <h1>새 글 쓰기</h1>
    <hr>
    
    <form action="{{ route('qnaArticles.store') }}" method="post">

        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
            <label for="title">제목</label>
            <input type="text" name="title" id="title" value="{{old('title')}}" class="form-control" />
            {!! $errors->first('title', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}"></div>
            <label for="content">내용</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{old('content')}}</textarea>
            {!! $errors->first('content', '<span class="form-error">:message</span>') !!}
        <div class="form-group">
            <button type="submit" class="btn btn-primary gray">저장</button>
        </div>
    </form>
</div>
@stop
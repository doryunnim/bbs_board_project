@extends('layouts.app')

@section('content')
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
            <button type="submit" class="btn btn-primary">저장</button>
        </div>
    </form>
</div>
@stop
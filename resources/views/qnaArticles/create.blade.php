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

        <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
            <label for="content">내용</label>
            <textarea name="content" id="content" rows="10" class="form-control">{{old('content')}}</textarea>
            {!! $errors->first('content', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            <label for="password">비밀번호</label>
            <input type="password" name="password" id="password" value="{{old('password')}}" class="form-control" />
            {!! $errors->first('password', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">저장</button>
        </div>
    </form>
</div>
@stop
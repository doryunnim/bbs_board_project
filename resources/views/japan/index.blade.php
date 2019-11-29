@extends('layouts.app')

@section('content')
<!-- Styles -->
<link href="{{ asset('css/headercss.css') }}" rel="stylesheet">
<link href="{{ asset('css/japan.css') }}" rel="stylesheet">
<div class="container">
    <div class="page-header">
        <h3>현지학기제</h3>
    </div>

    @if($japans->count())
    <div class="text-center">
        {!! $japans->appends((Request::except('page')))->render() !!}
    </div>
    @endif
</div>
<div class="contains">
    <aside class="side-bar">
        <div class="row">
            <div class="col">
                <a href="{{route('japan.create')}}" class="btn btn-primary m-b">글 쓰기</a>
                @forelse($japans as $japan)
                    @include('japan.partial.article', compact('japan'))
                @empty
                    <p class="text-center text-danger">글이 없습니다.</p>
                @endforelse
            </div>
        </div>
    </aside>
    <div class="main-chart">
        <div class="view m-b">
            <p>ajax</p>
        </div>  
        <!-- <a href="{{route('japan.index')}}" class="btn list">목록</a>
        <div class="view m-b">
            <small class="text-right">{{$japan->created_at}}</small>
            <div class="japanImage">
                @if($japan->attachments->count())
                    <ul class="attachment__article">
                        @foreach($japan->attachments as $attachment)
                            <li> -->
                            <!-- <img src="{{$attachment->filename}}" > -->
                                <!-- <a href="{{$attachment->url}}">
                                    {{$attachment->filename}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="jp_title">
                <h3>{{$japan->title}}</h3>
                <h5>{!! markdown($japan->content) !!}</h5>
            </div>
        </div>  
        <a  href="{{route('japan.edit', $japan->id)}}" class="btn btn-info offset-9-5">수정</a>
        <form action="{{route('japan.destroy', $japan->id)}}" method="post" class="del-btn">
            @csrf
            @method('DELETE')
            <button class="button__delete btn btn-danger">삭제</a>
        </form> -->
    </div>
</div>
@stop
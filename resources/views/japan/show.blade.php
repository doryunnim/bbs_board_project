@extends('layouts.app')
@section('content')
<!-- Styles -->
<link href="{{ asset('css/headercss.css') }}" rel="stylesheet">
<link href="{{ asset('css/japan.css') }}" rel="stylesheet">
<!-- <div class="container"> -->
<div class="contain">
        <div class="page-header">
        <h3 class="title">현지학기제</h3>
    </div>
</div>


<div class="contains">
    <aside class="side-bar">
        <div class="row">
            <div class="col">
                <a href="{{route('japan.create')}}" class="btn btn-primary m-b">글 쓰기</a>
                @forelse($japans as $japan)
                @include('japan.partial.article', compact('japan'))
                @empty
                <p class="text-center text-danger btn">글이 없습니다.</p>
                @endforelse
            </div>
        </div>
    </aside>
    <div class="main-chart">
        <div class="updatebtn">
            <a href="{{route('japan.index')}}" >목록</a>
        </div>
        <div class="view m-b">
            <small class="text-right">{{$japan->created_at}}</small>
            <div class="jp_title">
                <h3>{{$japan->title}}</h3>
                <h5>{!! markdown($japan->content) !!}</h5>
            </div>
            <div class="japanImage">
                @if($japan->attachments->count())
                    <ul class="attachment__article">
                        @foreach($japan->attachments as $attachment)
                            <li>
                            <!-- <img src="{{$attachment->filename}}" > -->
                                <a href="{{$attachment->url}}">
                                    {{$attachment->filename}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        <div class="changebtn">
            <div class="updatebtn">
                <a  href="{{route('japan.edit', $japan->id)}}" >수정</a>
            </div>
            <form action="{{route('japan.destroy', $japan->id)}}" method="post" class="del-btn">
                @csrf
                @method('DELETE')
                <button class="button__delete updatebtn">삭제</a>
            </form>
        </div>  
    </div>
    
</div>

<!-- <script>
    var edit = new Vue({
        el: '.button__edit',
        methods: {
            onEdit: function() {
                if(confirm("작성 글 비밀번호 확인")) {
                    location.replace('{{route('japan.edit', $japan->id)}}');
                }
            }
        }
    });

    var del = new Vue({
        el: '.button__delete',
        methods: {
            onDelete: function() {
                if(confirm("작성 글 비밀번호 확인")) {
                    location.replace('{{route('japan.index')}}');
                }
            }
        }
    });
</script> -->
@stop
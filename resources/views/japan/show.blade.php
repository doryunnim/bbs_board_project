@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
        <h3 class="title">{{$japan->title}}</h3>
    </div>

    <small class="text-right">{{$japan->created_at}}</small>
    
    <article class="m-b">
        <h5>{!! markdown($japan->content) !!}</h5>
    </article>

    <div class="action__article">
        <a href="{{route('japan.index')}}" class="btn btn-info">목록</a>

        <a  href="{{route('japan.edit', $japan->id)}}" class="btn btn-info offset-9-5">수정</a>
        <!-- <button class="btn btn-info button__edit" @click="onEdit()">글 수정</button> -->

        <form action="{{route('japan.destroy', $japan->id)}}" method="post" class="del-btn">
            @csrf
            @method('DELETE')
            <button class="button__delete btn btn-danger">삭제</a>
        </form>
        <!-- <button class="button__delete btn btn-danger" @click="onDelete()">글 삭제</button> -->
    </div>
</div>

<aside class="side-bar">
    <div class="row">
        <div class="col">
            <a href="{{route('japan.create')}}" class="btn btn-primary m-b">글 쓰기</a>
            @forelse($articles as $japan)
                @include('japan.partial.article', compact('japan'))
            @empty
                <p class="text-center text-danger">글이 없습니다.</p>
            @endforelse
        </div>
    </div>
</aside>

<!-- <script>
    var edit = new Vue({
        el: '.button__edit',
        methods: {
            onEdit: function() {
                if(confirm("작성 글 비밀번호 확인")) {
                    location.replace('{{route('japan.index')}}');
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
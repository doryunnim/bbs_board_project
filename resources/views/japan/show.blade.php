@extends('layouts.app')
@section('content')
<div class="container">
    @if($japan->attachments->count())
        <ul class="attachment__article">
            @foreach($japan->attachments as $attachment)
                <img src="{{ $attachment->filename }}" class="img-fluid">
            @endforeach
        </ul>
    @endif
    <div class="page-header">
        <h3 class="title">{{$japan->title}}</h3>
    </div>

    <small class="text-right">{{$japan->created_at}}</small>
    
    <article class="m-b" data-id="{{$japan->id}}" data-password="{{$japan->password}}">
        <h5>{!! markdown($japan->content) !!}</h5>
    </article>

    <div class="action__article">
        <a href="{{route('japan.index')}}" class="btn btn-info">목록</a>

        <a  href="{{route('japan.edit', $japan->id)}}" class="btn btn-info offset-9-5">수정</a>
        <!-- <button class="btn btn-info button__edit offset-9-5" @click="onEdit()">수정</button> -->

        <button class="button__delete btn btn-danger del-btn">삭제</button>
    </div>

</div>

<aside class="side-bar">
    <div class="row">
        <div class="col">
            <a href="{{route('japan.create')}}" class="btn btn-info m-b">+</a>
            @forelse($japans as $japan)
                @include('japan.partial.article', compact('japan'))
            @empty
                <p class="text-center text-danger">글이 없습니다.</p>
            @endforelse
        </div>
    </div>
</aside>
@stop

@section('script')
<script>
  $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.button__delete').on('click', function() {
        var japanId = $('article').data('id');
        var japanpw = $('article').data('password');
        console.log(japanpw);

        var pw_check = prompt("비밀번호 확인", "");

        if(pw_check == "") {
            alert("작성 글 비밀번호를 입력하시오");
        } 
        else if (pw_check == null) {
                alert("삭제 취소");
        } 
        else if (pw_check != "") {

            if(pw_check != japanpw) {
                alert("작성 글 비밀번호를 틀렸습니다");
            } 

            else {
                alert("작성 글을 삭제합니다");
                $.ajax({
                    type: 'DELETE',
                    url: '/japan/'+japanId
                }).then(function() {
                    window.location.href = '/japan';
                });
            }
        }
    });
  });
</script>
@stop
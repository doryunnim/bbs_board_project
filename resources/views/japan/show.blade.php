@extends('layouts.app')
@section('content')
<div class="container">
    @if($japan->attachments->count())
        <ul class="attachment__article">
            @foreach($japan->attachments as $attachment)
                <img src="{{$attachment->url}}" class="row">
            @endforeach
        </ul>
    @endif
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
        <!-- <button class="btn btn-info button__edit offset-9-5" @click="onEdit()">수정</button> -->

        <!-- <form action="{{route('japan.destroy', $japan->id)}}" method="post" class="del-btn">
            @csrf
            @method('DELETE')
            <button class="button__delete btn btn-danger">삭제</button>
        </form> -->
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
        var japan = $('japan');
        var str = JSON.stringify(japan);
        var jsn = JSON.parse(str);
        console.log('japan:'+str);

        if(confirm("Delete")) {
            $.ajax({
                type: 'DELETE',
                success: function(data) {
                    console.log(data)
                }
            }).then(function() {
                window.location.href = '/japan';
            });
        }
    });
  });
</script>
@stop
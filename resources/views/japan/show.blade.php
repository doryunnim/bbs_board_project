@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
        <h3>{{$japan->title}}</h3>
    </div>

    <article>
        <p>{!! markdown($japan->content) !!}</p>
    </article>

    <div class="text-center action__article">
        <a href="{{route('japan.edit', $japan->id)}}" class="btn btn-info">
            글 수정
        </a>
        <button class="btn btn-dander btn-info button__delete">
            글 삭제
        </button>
        <a href="{{route('japan.index')}}" class="btn btn-info">
            글 목록
        </a>
    </div>
</div>

<aside class="side-bar">
    <div class="row">
        <div class="col">
            <a href="{{route('japan.create')}}" class="btn btn-primary m-b">글 쓰기</a>
            @forelse($articles as $japan)
                @include('japan.partial.article', compact('japan'))
            @empty
            @endforelse
        </div>
    </div>
</aside>
@stop

@section('script')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.button__delete').on('click',function(e){
        var articleId = '{{ $japan->id }}';

        if(confirm('글 삭제')){
            $.ajax({
                type: 'DELETE',
                url: '/japan/'+articleId
            }).then(function(){
                window.location.href='/japan';
            });
        }
    });
</script>
@stop
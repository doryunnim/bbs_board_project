@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
        <h3>{{$introduce->title}}</h3>
    </div>
    <article data-id="{{ $introduce->id }}">
        <img src="{{ $introduce->url }}" class="img-fluid">
        <h4>{{ $introduce->name }}</h4>
        <p>{{ $introduce->comment }}</p>
    </article>
    <div class="text-center action__article">
        <a href="{{route('introduces.edit', $introduce->id)}}" class="btn btn-info">글 수정</a>
        <button class="btn btn-danger button__delete">
            <i class="fa fa-trash-o"></i> 삭제
        </button>
        <a href="{{route('introduces.index')}}" class="btn btn-info">뒤로가기</a>
    </div>
</div>
@stop

@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.button__delete').on('click', function(e){
            var articleId = $('article').data('id');

            if(confirm('글을 삭제합니다.')){
                $.ajax({
                    type: 'DELETE',
                    url: '/introduces/' + articleId
                }).then(function(){
                    window.location.href = '/introduces';
                });
            }
        }); 
    </script>
@stop

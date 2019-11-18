@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
        <h3>{{$article->title}}</h3>
    </div>

    <article>
        @include('articles.partial.article', compact('article'))
        <p>{!! markdown($article->content) !!}</p>
    </article>

    <div class="text-center action__article">
        <a href="{{route('articles.edit', $article->id)}}" class="btn btn-info">
            글 수정
        </a>
        <button class="btn btn-dander btn-info button__delete">
            글 삭제
        </button>
        <a href="{{route('articles.index')}}" class="btn btn-info">
            글 목록
        </a>
    </div>
</div>
@stop

@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKRN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.button__delete').on('click', function(e){
            var articleId = $('article').data('id');

            if(confirm('글 삭제')) {
                $.ajax({
                    type: 'DELETE',
                    url: '/articles/'+articleId
                }).then(function(){
                    window.location.href='/articles';
                });
            }
        });
    </script>
@stop
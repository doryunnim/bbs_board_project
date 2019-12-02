@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-header">
        <h3>현지학기제</h3>
    </div>
    <hr>
    <!-- 작성 글 보이게 할 div 태그 -->
    @forelse($japans as $japan)
    <div class="test" style="display:none">
        @if($japan->attachments->count())
            <ul class="attachment__article">
                @foreach($japan->attachments as $attachment)
                    <img src="{{ $attachment->filename }}" class="img-fluid">
                @endforeach
            </ul>
        @endif

        <div class="page-header">
            <h3 id="article-title"></h3>
        </div>

        <small id="article-created" class="text-right"></small>
        
        <article class="m-b">
            <h5 id="article-content"></h5>
        </article>

        <div class="action__article">
            <button class="btn btn-info button__edit offset-9-5" >수정</button>
            <button class="button__delete btn btn-danger del-btn">삭제</button>
        </div>
    </div>
    @empty
    @endforelse
</div>

<aside class="side-bar">
    <div class="row">
        <div class="col">
            <a href="{{route('japan.create')}}" class="btn btn-info m-b create"><img src="img/add.png"></a>
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

    $('.create').on('click', function() {
        if(confirm("Create")) {
            $.ajax({
                success: function(data) {
                    console.log(data)
                },
                error: function(request, status, error) {
                    consol.log(request.status+"\n"+request.responseText)                    
                }
            });
        }
    });

    $('.btn-show').on('click', function() {     //btn-show 클래스를 가진 버튼을 누르면 실행됨
        var japanData = $('.btn-show').data('all');     //$japan에 담긴 값
        console.log(japanData);

        var japanImg = $('.btn-show').data('img')[0];   //$japan의 id에 연결된 attachments 값
        console.log(japanImg);

        $('.test').show();      //숨긴 div 태그 보이게
        
        //기존 태그에 있던 값을 $japan에서 원하는 값 찾아서 바꿔치기
        $('#article-title').replaceWith(japanData.title);
        $('#article-created').replaceWith(japanData.created_at);
        $('#article-content').replaceWith(japanData.content);
        $('#article-img').attr("src", japanImg.filename);
        
    });  
  });
</script>
@stop
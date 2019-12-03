@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-header">
        <h3>현지학기제</h3>
    </div>
    <hr>
    <!-- 작성 글 보이게 할 div 태그 -->
    @foreach($japans as $japan)
        <div id="show" style="display:none">@include('japan.partial.show', compact('japan'))</div>
    @endforeach
    <div id="create" style="display:none"></div>
</div>

<aside class="side-bar">
    <div class="row">
        <div class="col">
            <button class="btn btn-info m-b button__create"><img src="img/add.png"></button>
            <!-- <a href="{{route('japan.create')}}" class="btn btn-info m-b create"><img src="img/add.png"></a> -->
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
    console.log($('.show'));
    //article 태그의 data 값 가져옴
    var japanId = $('article').data('id');
    var japanPw = $('article').data('password');

    $('.button__create').on('click', function() {
        if(confirm("Create")) {
            $('#create').show();    //숨긴 태그 보임
            $('#show').hide();      //보이는 태그 숨김
        }
    });

    $('#saveBtn').on('click', function() {
        var data = new FormData('#createJapan');
        
        if(confirm("create")) {
            $.ajax({
                type: "POST",
                data: data,
                dataType: 'formData',
                processData: false,
                url: "{{route('japan.store')}}",
                success: function (data) {
                    window.location.href = '/japan';
                }
            });
            console.log(data);
        }
    });

    $('.japan__show').on('click', function() {     //btn-show 클래스를 가진 버튼을 누르면 실행됨
        var japanData = $('.japan__show').data('all');     //$japan에 담긴 모든 값
        console.log(japanData);

        var japanImg = $('.japan__show').data('img');   //$japan의 id에 연결된 attachments 값
        console.log(japanImg);

        $('#show').show();      //숨긴 div 태그 보이게
        $('#create').hide();
        
        //기존 태그에 있던 값을 $japan에서 원하는 값 찾아서 바꿔치기
        $('#article-title').replaceWith(japanData.title);
        $('#article-created').replaceWith(japanData.created_at);
        $('#article-content').replaceWith(japanData.content);
        $('#article-img').attr("src", japanImg.filename);
        
        $('.button__edit').on('click', function() {     //글 수정
            var pw_check = prompt("작성 글 비밀번호 확인", "");

            if(pw_check == "") {    //아무것도 입력 안 했을 때
                alert("작성 글 비밀번호를 입력하세요.");
            } 
            else if (pw_check == null) {    //취소 버튼
                    alert("작성 글 수정을 취소합니다.");
            } 
            else if (pw_check != "") {      //입력 값이 있을 때

                if(pw_check != japanPw) {
                    alert("작성 글 비밀번호를 틀렸습니다.");
                } 

                else {
                    alert("작성 글을 수정합니다.");
                    $('#show').hide();
                    $('#create').hide();
                }
            }
        })

        $('.button__delete').on('click', function() {   //글 삭제
            var pw_check = prompt("작성 글 비밀번호 확인", "");

            if(pw_check == "") {
                alert("작성 글 비밀번호를 입력하세요.");
            } 
            else if (pw_check == null) {
                    alert("작성 글 삭제를 취소합니다.");
            } 
            else if (pw_check != "") {

                if(pw_check != japanPw) {
                    alert("작성 글 비밀번호를 틀렸습니다.");
                } 

                else {
                    alert("작성 글을 삭제합니다.");
                    $.ajax({
                        type: 'DELETE',
                        url: '/japan/'+japanId
                    }).then(function() {
                        window.location.href = '/japan';    //ajax가 성공하면 127.0.0.1:8000/japan으로 이동
                    });
                }
            }
        });
    });
  });
</script>
@stop
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var jpIds = $('aside').data('ids');         //존재하는 japan의 id 배열
    
    console.log(jpIds);

    $.each(jpIds, function(idx, e) {    //i = 배열의 index 값    e = 실제 id 값
        var japanData = $('.japan__show'+e).data('all');     //$japan에 담긴 모든 값
        var jpImg = $('.japan__show'+e).data('img');
        var path = jpImg[0].filename;

        //글 불러오기 method: GET
        $('.japan__show'+e).on('click', function() {     //btn-show 클래스를 가진 버튼을 누르면 실행됨
            console.log(e);
            console.log(japanData.password);
            $.ajax({
                type: "GET",        //http 요청방식
                url: '/japan/'+e,   //요청이 전송되는 url이 포함된 문자열
                data: japanData,    //요청후 return하는 값
            }).then(function() {
                $('#create').hide();
                $('#show').show();
                $('.hide').hide();
                $('#button__edit'+e).show();
                $('#button__delete'+e).show();
                $('#attach').attr('src',path);
                $(".title").replaceWith('<h3 class="title">'+japanData.title+'</h3>');
                $(".created").replaceWith('<small class="created">'+japanData.created_at+'<small>');
                $(".content").replaceWith('<h5 class="content">'+japanData.content+'</h5>');
            });
        });

        //edit페이지로 이동
        $('#button__edit'+e).on('click', function() {
            var pw_check = prompt("작성 글 비밀번호 확인", "");

            if(pw_check == "") {    //아무것도 입력 안 했을 때
                alert("작성 글 비밀번호를 입력하세요.");
            } 
            else if (pw_check == null) {    //취소 버튼
                    alert("작성 글 수정을 취소합니다.");
            } 
            else if (pw_check != "") {      //입력 값이 있을 때

                if(pw_check != japanData.password) {
                    alert("작성 글 비밀번호를 틀렸습니다.");
                } 

                else {
                    alert("작성 글을 수정합니다.");
                    window.location.href = '/japan/'+e+'/edit';
                }
            }
        });
            
        //글 삭제   method: DELETE
        $('#button__delete'+e).on('click', function() {  
            console.log(e); 
            var pw_check = prompt("작성 글 비밀번호 확인", "");

            if(pw_check == "") {
                alert("작성 글 비밀번호를 입력하세요.");
            } 
            else if (pw_check == null) {
                    alert("작성 글 삭제를 취소합니다.");
            } 
            else if (pw_check != "") {

                if(pw_check != japanData.password) {
                    alert("작성 글 비밀번호를 틀렸습니다.");
                } 

                else {
                    alert("작성 글을 삭제합니다.");
                    $.ajax({
                        type: 'DELETE',
                        url: '/japan/'+japanData.id
                    }).then(function() {
                        window.location.href = '/japan';    //ajax가 성공하면 127.0.0.1:8000/japan으로 이동
                    });
                }
            }
        });
    });
    
    //create form 보여주는 것
    $('.button__create').on('click', function() {
        $.ajax({
            type: "GET",
            url: '/japan/create',
            success: function() {
                $('#create').show();
                $('#show').hide();
                $('.hide').hide();
            }
        });
    });

    //작성 글 저장 method: POST
    $('#createJapan').on('clcik', function() {
        var form = $(this);
        $.ajax({
            data: form.serialize(),
            cache: false,
            contentType: false,
            processData: false,
            type: "POST",
            url: "{{route('japan.store')}}",
        }).then(function() {
            window.location.reload();
        });
    });

    //글 수정: PUT이랑 PATCH 안되서 POST로 함
    $('#updateJapan').on('click', function() {
        var form = $(this);
        alert('clicked');
        $.ajax({
            type: 'POST',
            url: '/japan/'+japanData.id,
            data: form.serialize(),
            cache: false,
            contentType: false,
            processData: false,
            success: function() {   //http 요청 성공 시 실행
                window.history.back();
            },
            error: function(error) {    //http 요청 실패 시 실행
                console.log('msg:'+error);
            }
        });
    });
});

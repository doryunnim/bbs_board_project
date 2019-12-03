$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var japanData = $('.japan__show').data('all');     //$japan에 담긴 모든 값

    //작성 폼
    $('.button__create').on('click', function() {
        $.ajax({
            type: "GET",
            url: '/japan/create',
            success: function() {
                window.location.href = '/japan/create';
            }
        });
    });

    //작성 글 저장
    $('#createJapan').on('submit', function() {
        var form = $(this);
        var formdata = false;
        if(window.formData) {
            formdata = new FormData(form[0]);
            formdata.append('imgs', $('imgs')[0].files[0]);
        }

        var formAction = form.attr('action');
        confirm(form.serialize());
        $.ajax({
            data: formdata ? formdata : form.serialize(),
            cache: false,
            contentType: false,
            processData: false,
            type: "POST",
            url: "{{route('japan.store')}}",
            success: function(data) {
                window.location.href = '/japan';
            },
            error: function(err) {
                console.log('error:\n'+JSON.stringify(err));
            }
        });
    });

    //글 불러오기
    $('.japan__show').on('click', function() {     //btn-show 클래스를 가진 버튼을 누르면 실행됨
        var japanImg = $('.japan__show').data('img');   //$japan의 id에 연결된 attachments 값
        
        $.ajax({
            type: "GET",
            url: '/japan/'+japanData.id,
            success: function() {
                console.log(japanData.id);
                $('#show').show();
            }
        });

    });
});
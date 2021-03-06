@extends('layouts.app')
@section('content')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<style>
        .page-header{
            display: flex;
        }
        .apsolute{
            margin-left: 75%;
        }
</style>
<div class="container">
    <div class="page-header">
        <h3>Introduce My teams</h3>
        <a href="{{ route('introduces.create') }}" class="apsolute">
            <i class="fa fa-list"></i> ADD
        </a>
    </div>
    <hr>
    <div class="row">
        @forelse($intro')
        @emptyduces as $introduce)
            @include('introduce.partial.member
        <p class="text-center text-danger">글이 없습니다.</p>
        @endforelse
    </div>
    <div class="container" style="text-align:center">
        <hr>
        <h2>introducing we are members detail</h2>
        <hr>
    </div>  
    <div class="row">
        @forelse($introduces as $introduce)
            @include('introduce.partial.detail')
        @empty
        <p class="text-center text-danger">글이 없습니다.</p>
        @endforelse
    </div>

    <div class="modal" id="Mymodal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>수정하는 창입니다 호호</h2><br>
        <form class="member_update" method="POST" enctype="multipart/form-data">
            <!-- 검증된 사용자의 요청만 승인 -->
            @csrf 
                <!-- 사진 인풋 -->
                <div class="form-group">
                    <img id="photo_preview" width="250px" height="200" src="#" /> <br><br>
                    <input type="file" name="image" id="image" class="form-control" />
                </div>

                <!-- 이름 인풋 -->
                <div class="form-group">
                    <label for="name">이름 : </label>
                    <input type="text" name="name" id="name" class="form-control" />
                </div>

                <!-- 코멘트 인풋 -->
                <div class="form-group =">
                    <label for="comment">코멘트 : </label>
                    <input type="text" name="comment" id="comment" class="form-control" />
                </div>
                <div class="form-group">
                    <input type="hidden" name="hidden_id" id="hidden_id" />
                    <button type="button" class="btn btn-primary btn__saved">
                        <i class="fa fa-trash-o"></i> 완료
                    </button>
                    <span id="span_image"></span>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        var target;
        // $('.navbar-bar').append('<li class=nav-item>조원추가</li>');
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.btn__update').on('click', function(e) {
        if (confirm('수정할거야? ')) {
            target = e.target.id;
            console.log('첫번째 수정이벤트 : target : ' + target);
            $.ajax({
                    type: 'GET',
                    url: '/introduces/' + target,
                })
                .then((data) => {
                    console.log('show에 들렸다가 데이터 가져왔음');
                    console.log(data);
                    $('#Mymodal').css("display", "block"); //URL::to =
                    $('#photo_preview').attr("src", "{{ URL::to('/') }}/img/" + data.image); // 예전 사진 로딩
                    $('#image').val("");
                    $('#name').val(data.name); // 예전 이름 로딩
                    $('#comment').val(data.comment); // 예전 코멘트 로딩
                    $('#hidden_id').val(data.id);
                });
        }
    });
    $('.btn__saved').on('click', function(e) {
        if (confirm('저장할꺼야 ?')) {
            var form = $('.member_update').get(0);
            //$()는 제이쿼리객체 우리가 필요한건 htmlformElement
            console.log("뽐 데이터", form);
            $.ajax({
                    url: "{{ route('introduces.update') }}",
                    method: "POST",
                    processData: false,
                    contentType: false,
                    cache: false,
                    dataType: "json",
                    data: new FormData(form),
                })
                .then(() => {
                    // 에이작스 안의 에이작스
                    $.ajax({
                            type: 'GET',
                            url: '/introduces/' + target,
                        })
                        .then((data) => {
                            console.log('업데이트 된 정보를 div에 출력');
                            console.log(data);
                            $('#detail_image' + target).attr("src", "{{ URL::to('/') }}/img/" + data.image);
                            $('#detail_name' + target).text(data.name);
                            $('#detail_comment' + target).text(data.comment);

                            $('#index_image' + target).attr("src", "{{ URL::to('/') }}/img/" + data.image);
                            $('#index_name' + target).text(data.name);
                        });
                    $('#Mymodal').css("display", "none");
                });
        }
    });

    // URL 미리보기 함수
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#photo_preview').attr("src", reader.result);
                
                console.log('======= '+reader.result)
            }
            reader.readAsDataURL(input.files[0]);
            console.log('======= '+input.files[0])
        }
    }
    $("#image").change(function() {
        readURL(this);
    });

    $('.btn__delete').on('click', function(e) {
        var target = e.target.id;
        if (confirm('진짜 삭제할꼬양?')) {
            $.ajax({
                type: 'DELETE',
                url: '/introduces/' + target,
            }).then(function() {
                $('#index_member' + target).remove();
                $('#detail_member' + target).remove();
            });
        }
    });
    $('.close').on('click', function() {
        $('#Mymodal').css("display", "none");
    });
</script>
@stop
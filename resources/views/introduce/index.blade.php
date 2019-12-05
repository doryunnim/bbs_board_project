@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-header">
        <h3>Introduce My teams</h3>
    </div>
    <hr>
    <div class="row">
        <!-- 조원 사진 & 추가 부분 -->
        @foreach($introduces as $introduce)
        <div class="col-md-2">
            <div class="w3-container">
                <div class="w3-card" style="width:150px; height:150px">
                    <img src="{{ $introduce->url }}" alt="Person" style="width:150px; height:118px">
                    <div class="w3-container">
                        <h4>{{ $introduce->name }}</h4>
                    </div>
                </div>
            </div>
            <br>
        </div>
        @endforeach
        <a href="{{ route('introduces.create') }}">ADD</a>
    </div>
    <div class="container" style="text-align:center">
        <h2>우리 조는 말이죠</h2>
        <h2>우리 조는 말이죠</h2>
        <h2>우리 조는 말이죠</h2>
        <h2>우리 조는 말이죠</h2>
        <hr>
    </div>
    <div class="row">
        @foreach($introduces as $introduce)
        <div class="col-md-4">
            <img src="{{ $introduce->url }}" class="img-fluid">
            <h4>{{ $introduce->name }}</h4>
            <h3>{{ $introduce->comment }}</h3>

            <button class="btn btn-primary btn__update" id="{{ $introduce->id }}">
                <i class="fa fa-trash-o"></i> 수정
            </button>
            <button class="btn btn-danger btn__delete" id="{{ $introduce->id }}">
                <i class="fa fa-trash-o"></i> 삭제
            </button>
        </div>
        @endforeach
    </div>

    <div class="modal" id="Mymodal" style="width:500; height:300">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>수정하는 창입니다 호호</h2><br>
            <form class="member_update" action="{{ route('introduces.update', $introduce->id) }}" enctype="multipart/form-data">
                @csrf
                <!-- 사진 인풋 -->
                <div class="form-group {{ $errors->has('url') ? 'has-error' : '' }}">
                    <img id="photo_preview" width="250px" height="200" src="#" /> <br><br>
                    <input type="file" name="image" id="image_input" class="form-control" />
                    {!! $errors->first('url', '<span class="form-error">:message</span>') !!}
                </div>

                <!-- 이름 인풋 -->
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">이름 : </label>
                    <input type="text" name="name" id="name" value="" class="form-control" />
                    {!! $errors->first('name', '<span class="form-error">:message</span>') !!}
                </div>

                <!-- 코멘트 인풋 -->
                <div class="form-group {{ $errors->has('comment') ? 'has-error' : '' }}">
                    <label for="comment">코멘트 : </label>
                    <input type="text" name="comment" id="comment" value="" class="form-control" />
                    {!! $errors->first('name', '<span class="form-error">:message</span>') !!}
                </div>
                <div class="form-group">
                    <!-- <button type="btn btn-primary btn__update__saved" id="{{ $introduce->id }}">저장</button> -->
                    <button class="btn btn-primary btn__saved" id="{{ $introduce->id }}">
                        <i class="fa fa-trash-o"></i> 완료
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.btn__update').on('click', function(e) {
        var target = e.target.id;
        console.log(target);
        $.ajax({
                type: 'GET',
                url: '/introduces/' + target,
            })
            .then((data) => {
                // data[0]{name:~~, comment:aa~~ 등등} 로그찍어보셈
                console.log(data);
                console.log('첫번째 수정이벤트');
                $('#Mymodal').css("display", "block");
                $('#photo_preview').attr("src", data[0].url); // 예전 사진 로딩
                $('#name').attr("value", data[0].name); // 예전 이름 로딩
                $('#comment').attr("value", data[0].comment); // 예전 코멘트 로딩
            });
    });
    $('.btn__saved').on('click', function(e) {
        var target = e.target.id;
        $.ajax({
                type: 'PATCH',
                url: '/introduces/' + target,
            })
            .then((Newdata) => {
                console.log(Newdata);
                console.log('2번째 수정이벤트');
                alert('저장완료');
                $('#photo_preview').attr("src", Newdata[0].url); // 뉴 사진 로딩
                $('#name').attr("value", Newdata[0].name); // 뉴 이름 로딩
                $('#comment').attr("value", Newdata[0].comment); // 뉴 코멘트 로딩
            });
    });

    // URL 미리보기 함수
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#photo_preview').attr("src", e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image_input").change(function() {
        readURL(this);
    });

    $('.btn__delete').on('click', function(e) {
        var target = e.target.id;
        if (confirm('진짜 삭제할꼬양?')) {
            $.ajax({
                type: 'DELETE',
                url: '/introduces/' + target
            }).then(function() {
                $(".col-md-2:first").remove();
                $(".col-md-4:first").remove();
            });
        }
    });
    $('.close').on('click', function() {
        $('#Mymodal').css("display", "none");
    });
</script>
@stop
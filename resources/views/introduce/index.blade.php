@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-header">
        <h3>Introduce My teams</h3>
    </div>
    <hr>
    <div class="row">
        @forelse($introduces as $introduce)
            @include('introduce.partial.member', compact('introduce'))
        @empty
            <p class="text-center text-danger">글이 없습니다.</p>
        @endforelse
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
        @forelse($introduces as $introduce)
            @include('introduce.partial.detail', compact('introduce'))
        @empty
            <p class="text-center text-danger">글이 없습니다.</p>
        @endforelse
    </div>

    <div class="modal" id="Mymodal" style="width:500; height:300">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>수정하는 창입니다 호호</h2><br>
            <form class="member_update" enctype="multipart/form-data">
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
                type: 'PUT',
                url: '/introduces/' + target,
            })
            .then((Newdata) => {
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
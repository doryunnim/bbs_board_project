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
        alert(target);
        $.ajax({
                type: 'GET',
                url: '/introduces/' + target,
            })
            .then((data) => {
                console.log(data);
            // $('.container').html('')
            // $('.container').load("index.blade.php");
            // $('.container').append("<form id=edit action={{ route('introduces.store') }} method=post enctype=multipart/form-data />")

            // $('#edit').append("<div class=form-group0 {{ $errors->has('url') ? 'has-error' : '' }}> </div>")
            // $('.form-group0').append("<label for=photo> 사진 </label>")
            // $('.form-group0').append("<img class=img-fluid src={{$introduce->url}} width=400 height=400 />")
            // $('#edit').append("<div class=form-group1 {{ $errors->has('name') ? 'has-error' : '' }}> </div>")
            // $('.form-group1').append("<label for=photo> 이름 : </label>")
            // $('.form-group1').append("<input type=text id=name value={{ old('$introduce->name') }}>  </input>")
            // $('#edit').append("<div class=form-group2 {{ $errors->has('comment') ? 'has-error' : '' }}> </div>")
            // $('.form-group2').append("<label for=photo> 한마디 : </label>")
            // $('.form-group2').append("<input type=text id=comment value={{ old('$introduce->comment') }}>  </input>")
            // $('#edit').append("<div class=form-group3></div>")
            // $('.form-group3').append("<button type=submit class=button__edit>저장</button>")

            // $('.container').append("<div class=text-center id=action__article/>")
            // $('.text-center').append("<a href={{route('introduces.edit', $introduce->id)}}>저장</a>")
            // $('.text-center').append("<button class=button__delete> 삭제 </button>")
            // $('.text-center').append("<a href={{route('introduces.index', $introduce->id)}}>뒤로가기</a>")    
        });
    });

    $('.btn__delete').on('click', function(e) {
        var target = e.target.id;
        if (confirm('글을 삭제합니다.')) {
            $.ajax({
                type: 'DELETE',
                url: '/introduces/' + target
            }).then(function(){
                alert('처음 삭제')
                $(".col-md-2:first").remove();
                $(".col-md-4:first").remove();
            });
        }
    });
</script>
@stop
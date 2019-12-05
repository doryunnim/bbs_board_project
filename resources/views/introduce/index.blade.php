@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-header">
        <h3>Introduce My teams</h3>
    </div>
    <hr>
    <div class="row" id=div_1>
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
    <div class="container" style="text-align:center" id=div_2>
        <h2>우리 조는 말이죠</h2>
        <h2>우리 조는 말이죠</h2>
        <h2>우리 조는 말이죠</h2>
        <h2>우리 조는 말이죠</h2>
        <hr>
    </div>
    <div class="row" id=div_3>
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
        <form class="form-gruop" id=form-edit action="{{route( 'introduces.store') }}" >
            @csrf
            <input type="file" value="오잉?"/><br><br>
            <img src=""  />
            <label for="text">이름 : </label>
            <input type="text" name="name" id="name" value="오잉?"/><br><br>
            <label for="text">한마디 : </label>
            <input type="text" name="comment" id="comment" value="오잉?"/><br><br>
     
            <button type="submit">저장</button>
            
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
        // var modal = document.getElementById('myModal');
        // var span = document.getElementsByClassName("close")[0];
        // modal.style.display = "block";
        alert(target);
            $.ajax({
                type: 'GET',
                url: '/introduces/' + target,
            })
            .then((data) => {
                $('#Mymodal').css("display", "block");
                console.log(data);
                var name = data[0].name;
                var comment = data[0].comment;
                var url = data[0].url;

                console.log(name);
                console.log(comment);
                console.log(url);
              
            
            // $('#div_3').append("<form id=edit action={{ route('introduces.store') }} method=post enctype=multipart/form-data />")

            // $('#edit').append("<div class=form-group0 {{ $errors->has('url') ? 'has-error' : '' }}> </div>")
            // $('.form-group0').append("<label for=photo>사진</label>")
            // $('.form-group0').append("<img class=img-fluid width=400 height=400 />")
            // $('.img-fluid').attr("src", url)

            // $('#edit').append("<div class=form-group1 {{ $errors->has('name') ? 'has-error' : '' }}> </div>")
            // $('.form-group1').append("<label for=photo> 이름 : </label>")
            // $('.form-group1').append("<input type=text id=name value={{ old('$introduce->name') }}>  </input>")

            // $('#edit').append("<div class=form-group2 {{ $errors->has('comment') ? 'has-error' : '' }}> </div>")
            // $('.form-group2').append("<label for=photo> 한마디 : </label>")
            // $('.form-group2').append("<input type=text id=comment></input>")

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
        if (confirm('진짜 삭제할꼬양?')) {
            $.ajax({
                type: 'DELETE',
                url: '/introduces/' + target
            }).then(function(){
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
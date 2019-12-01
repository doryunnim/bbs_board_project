@extends('layouts.app')
@section('content')
<link href="{{ asset('css/japan.css') }}" rel="stylesheet">
<link href="{{ asset('css/headercss.css') }}" rel="stylesheet">
<div class="container">
<<<<<<< HEAD
=======
    @if($japan->attachments->count())
        <ul class="attachment__article">
            @foreach($japan->attachments as $attachment)
                <img src="{{ $attachment->filename }}" class="img-fluid">
            @endforeach
        </ul>
    @endif
>>>>>>> 6476852aa6d152dfc674eb8220d0bceabcfbfdc1
    <div class="page-header">
        <h3>현지학기제</h3>
    </div>
</div>

<div class="contains">
    <div class="main-chart">
        <a href="{{route('japan.index')}}" class="listbtn btn-primary">목록</a>
        <div class="view">
            <small class="text-right">{{$japan->created_at}}</small>
            <div class="japanImage">
                @if($japan->attachments->count())
                    <!-- <ul class="attachment__article">
                        @foreach($japan->attachments as $attachment)
                            <img src="{{$attachment->url}}" class="Imagecontent">
                        @endforeach
                    </ul> -->
                    @foreach($japan->attachments as $attachment)
                            <img src="{{$attachment->url}}" class="Imagecontent">
                    @endforeach
                @endif
            </div>
            <div class="jp_title">
                <h3 class="title">{{$japan->title}}</h3>    
                <article class="m-b">
                    <h5>{!! markdown($japan->content) !!}</h5>
                </article>
            </div>
        </div>

        <div class="action__article">
            

            <a  href="{{route('japan.edit', $japan->id)}}" 
                class=" btn-info updatebtn left30">수정</a>
            <button class="button__delete  btn-danger updatebtn">삭제</button>
        </div>

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
</div>
@stop

@section('script')
<script>
  $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.button__delete').on('click', function() {
        var japan = $('japan');
        var str = JSON.stringify(japan);
        var jsn = JSON.parse(str);
        console.log('japan:'+str);
        if(confirm("Delete")) {
            $.ajax({
                type: 'DELETE',
                success: function(data) {
                    console.log(data)
                }
            }).then(function() {
                window.location.href = '/japan';
            });
        }
    });
  });
</script>
@stop
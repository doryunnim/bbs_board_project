@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-header">
        <h3>새 글 쓰기</h3>
    </div>
    
    <form action="{{ route('japan.store') }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="form-group">
            @include('japan.partial.form')
            <button type="submit" class="btn btn-primary">저장</button>
            <!-- <button type="button" class="btn btn-primary">저장</button> -->
        </div>
    </form>
</div>

<aside class="side-bar">
    <div class="row">
        <div class="col">
            <a href="{{route('japan.create')}}" class="btn btn-primary m-b">글 쓰기</a>
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

    $('button').on('click', function() {
        if(confirm("Create")) {
            $.ajax({
                type: "GET",
                dataType: "json",
                success: function(data) {
                    console.log(data)
                },
                error: function(request, status, error) {
                    consol.log(request.status+"\n"+request.responseText)                    
                }
            });
        }
    });

  });
</script>
@stop
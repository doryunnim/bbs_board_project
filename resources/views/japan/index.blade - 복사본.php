@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-header">
        <h3>현지학기제</h3>
    </div>
    
    @if($japans->count())
    <div class="text-center">
        {!! $japans->appends((Request::except('page')))->render() !!}
    </div>
    @endif
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
@stop

@section('script')
<script>
  $(document).ready(function () {
    var test = $('.title');
    console.log(test);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.create').on('click', function() {
        if(confirm("Create")) {
            $.ajax({
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
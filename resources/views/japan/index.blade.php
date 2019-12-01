@extends('layouts.app')

@section('content')
<!-- Styles -->
<link href="{{ asset('css/headercss.css') }}" rel="stylesheet">
<link href="{{ asset('css/japan.css') }}" rel="stylesheet">
<div class="container">
    <div class="page-header">
        <h3>현지학기제</h3>
    </div>

    <!-- <button class="btn btn-info test">Ajax Test</button> -->
</div>
<div class="contains">
    
    <div class="main-chart">
        <div class="view m-b">
            <p>ajax</p>
        </div>  
        
    </div>
    <aside class="side-bar">
    @if($japans->count())
        <div class="text-center">
            {!! $japans->appends((Request::except('page')))->render() !!}
        </div>
    @endif
<<<<<<< HEAD
        <div class="row">
            <div class="col">
                <a href="{{route('japan.create')}}" class="btn btn-info m-b create"><img src="img/add.png"></a>
                @forelse($japans as $japan)
                    @include('japan.partial.article', compact('japan'))
                @empty
                    <p class="text-center text-danger">글이 없습니다.</p>
                @endforelse
        </div>
    </aside>
=======
>>>>>>> 6476852aa6d152dfc674eb8220d0bceabcfbfdc1
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
 
    $('.test').on('click', function () {
        if(confirm("Test")) {
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
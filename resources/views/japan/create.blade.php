@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-header">
        <h3>새 글 쓰기</h3>
    </div>
    
    <form action="{{ route('japan.store') }}" id="createJapan" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="form-group">
            @include('japan.partial.form')
            <button type="submit" id="saveBtn" class="btn btn-primary">저장</button>
        </div>
    </form>
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

    $('#createJapan').on('submit', function() {
        var form = $(this);
        var formdata = false;
        if(window.formData) {
            formdata = new FormData(form[0]);
            formdata.append('imgs', $('imgs')[0].files[0]);
        }

        var formAction = form.attr('action');
        $.ajax({
            data: formdata ? formdata : form.serialize(),
            cache: false,
            contentType: false,
            processData: false,
            type: "POST",
            url: "{{route('japan.store')}}",
            success: function(data) {
                window.location.href = '/japan';
            }
        });
    });
  });
</script>
@stop
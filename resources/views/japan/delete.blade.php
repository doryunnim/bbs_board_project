@section('content')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.button__delete').on('click',function(e){
        var articleId = '{{ $japan->id }}';

        if(confirm('글 삭제')){
            $.ajax({
                type: 'DELETE',
                url: '/japan/'+articleId
            }).then(function(){
                window.location.href='/japan';
            });
        }
    });
</script>
@stop
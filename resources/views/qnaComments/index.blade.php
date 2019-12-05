<div class="page-header">
    <h4>댓글</h4>
</div>
<!-- 새로운 댓글 작성 창 -->
<div class="form__new__comment">
    @if($currentUser)
        <!-- 댓글 작성 폼 -->
        @include('qnaComments.partial.create')
    @else
        @include('qnaComments.partial.login')
    @endif
</div>
<!-- 기존 댓글 창 -->
<div class="list__comment">
    @forelse($qnaComments as $comment)
        @include('qnaComments.partial.comment', [
            'parentId' => $comment->id,
            'isReply' => false,
        ])
    @empty
    @endforelse
    
</div>
@section('script')
    @parent
    <script>
        var sendCheck = "ss";
        $(document).ready(function(){
            var create_box = $('.top').get(0);
            $(create_box).css('display', 'block');
        });

        $.ajaxSetup({
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

        $('.btn__delete__comment').on('click', function(e){
            var commentId = $(this).closest('.item__comment').data('id');

            if(confirm('댓글을 삭제합니다.')){
                $.ajax({
                    type: 'DELETE',
                    url: "/qnaComments/" + commentId,
                }).then(function(){
                    $('#comment_' + commentId).fadeOut(1000, function(){ $(this).remove();});
                });
            }
        });

        $('.btn-primary').on('click', function(e){
            var commentId = $(this).closest('.item__comment').data('id'),
                articleId = $('article').data('id');
                var target = e.target;
                var text_right = target.parentElement;
                var media_body = text_right.parentElement;
                var create_box = media_body.parentElement;
                var parent = create_box.parentElement;
                var comment_box = $(parent).children('.content__comment');
                var textarea = $(media_body).find('textarea')[0];

                if(sendCheck == "edit" ){
                    if(confirm('댓글을 수정합니다.')){
                    $.ajax({
                        type: 'PUT',
                        url: "/qnaComments/" + commentId,
                        data: {
                            content : $(textarea).val(),
                        },
                    }).then(function(){
                        $(create_box).css("display", "none");
                        $(comment_box).children('p').text($(textarea).val());
                        sendCheck = "";
                    });
                    }
                }
                else{
                    if(confirm('댓글을 작성합니다.')){
                        $.ajax({
                            type: 'POST',
                            url: "/qnaArticles/" + articleId + "/qnaComments",
                            data: {
                                content : $(textarea).val(),
                                parent_id : commentId,
                            },
                        }).then(function(){
                            window.location.href = '/qnaArticles/'+articleId
                        });
                    }
                }
        });

        $('.btn__edit__comment').on('click', function(e){
            var commentId = $(this).closest('.item__comment').data('id'),
                articleId = $('article').data('id');                     
                var target = e.target;                 
                var parent = $(this).closest('.media-body');
                var content = $(parent).children(".media__create__comment");
                var textarea = $(parent).find('textarea');
                var text = $(parent).children('.content__comment')
                if($(content).css("display") == "none"){
                    $(textarea).val("");
                    $(content).css("display", "block");
                    sendCheck = "edit"
                }
                else{
                    $(content).css("display", "none");
                    sendCheck = ""
                }
        });
        
        $('.btn__replay__comment').on('click', function(e){
            var target = e.target
            var parent = $(this).closest('.media-body');
            var content = $(parent).children(".media__create__comment");
            var text = $(parent).children('.content__comment');
            var textarea = $(parent).find('textarea');
            if($(content).css("display") == "none"){
                $(content).css("display", "block");
                $(textarea).val("");
                sendCheck = "add"
            }
            else{
                $(content).css("display", "none");
                sendCheck = ""
            }
        })

    </script>
@endsection
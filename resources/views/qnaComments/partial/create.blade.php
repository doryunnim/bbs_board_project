<div class="media media__create__comment {{ isset($parentId) ? 'sub' : 'top' }}"  style="display:none">

    <div class="media-body">
        @csrf 

        @if(isset($parentId))
            <input type="hidden" name="parent_id" value="{{ $parentId }}">   
        @endif

        <div class="form-group">
            <textarea name="content" class="form-control" rows="3">{{ old('content') }}</textarea>
        </div>
        <div class="text-right">
            <button class="btn btn-primary btn-sm" onclick="primary(this)">전송</button>
        </div>
    </div>
</div>
<script>
    var sendCheck = "";
    function primary(e){
        var commentId = $(e).closest('.item__comment').data('id'),
            articleId = $('article').data('id');
        var target = e;
        var main_create_box = $('.top').get(0); 
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
                }).then((comment)=>{
                    $(parent).append(comment.html);
                    $(create_box).css("display", "none");
                    $(textarea).val("")
                    $(main_create_box).css('display', 'block');
                    sendCheck = ""; 
                });
            }
        }
    }
</script>
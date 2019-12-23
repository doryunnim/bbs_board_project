<div class="media item__comment {{ $isReply ? 'sub' : 'top' }}"
    data-id="{{ $comment->id }}" id="comment_{{ $comment->id }}" data-aos="fade-down">

    <div class="media-body">
        <h5 class="media-heading">
            @if($isReply)
                <img src="../img/commentarrow.png">
            @endif
            <a href=#>
                {{ $comment->user->name }}
            </a>
            <small>
                {{ $comment->created_at->diffForHumans() }}
            </small>
        </h5>

        <div class="content__comment">
            <p data-id="add">{{ $comment->content }}</p>
        </div>
    
        <div class="action_comment">
            @can('delete', $comment)
            <button class="btn__delete__comment" onclick="del(this)">삭제</button>
            @endcan
            @can('update', $comment)
            <button class="btn__edit__comment" onclick="edit(this)">수정</button>
            @endcan
            <button class="btn__reply__comment" onclick="reply(this)">답글</button>
        </div>
        
        @if($currentUser)
            @include('qnaComments.partial.create', ['parentId' => $comment->id])
        @endif
        @forelse($comment->replies as $reply)
            @include('qnaComments.partial.comment', [
                'comment' => $reply,
                'isReply' => true,
            ])
        @empty
        @endforelse
    </div>
</div>
<script>
    $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });

    function edit(e){
        var commentId = $(e).closest('.item__comment').data('id');
        var parent = $(e).closest('.media-body');
        var content = $(parent).children(".media__create__comment");
        var textarea = $(parent).find('textarea');
        var text = $(parent).children('.content__comment');
        if($(content).css("display") == "none"){
            $(textarea).val("");
            $(content).css("display", "block");
            sendCheck = "edit"
        }
        else{
            $(content).css("display", "none");
            sendCheck = ""
        }
    }

    function reply(e){
        var parent = $(e).closest('.media-body');
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
    }

    function del(e){
        var commentId = $(e).closest('.item__comment').data('id');
        if(confirm('댓글을 삭제합니다.')){
            $.ajax({
                type: 'DELETE',
                url: "/qnaComments/" + commentId,
            }).then(function(){
                $('#comment_' + commentId).fadeOut(1000, function(){ $(this).remove();});
            });
        }
    }
</script>
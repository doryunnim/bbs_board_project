<!-- @php
    $currentUser = auth()->user();
    $comments = $qnaArticle->qnaComments;
@endphp -->

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
        $('.btn__delete__comment').on('click', function(e){
            var commentId = $(this).closest('.item__comment').data('id'),
                articleId = $('#item_article').data('id')

            if(confirm('댓글을 삭제합니다.')){
                $.ajax({
                    type: 'DELETE',
                    url: "/qnaComments/" + commentId,
                }).then(function(){
                    $('#comment_' + commentId).fadeOut(1000, function(){ $(this).remove();});
                });
            }
        });
    </script>
@endsection
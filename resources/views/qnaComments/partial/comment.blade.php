 <div class="media item__comment {{ $isReply ? 'sub' : 'top' }}"
    data-id="{{ $comment->id }}" id="comment_{{ $comment->id }}" data-aos="fade-down">

    <div class="media-body">
        <h5 class="media-heading">
            @if($isReply)
                <img src="../img/commentarrow.png">
            @endif
            <a href="{{ $comment->user->email }}">
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
            <button class="btn__delete__comment">삭제</button>
            @endcan
            @can('update', $comment)
            <button id="1" class="btn__edit__comment" data-id="edit">수정</button>
            @endcan
            <button id="1" class="btn__replay__comment" data-id="edit">답글</button>
        </div>
        
        @if($currentUser)
            @include('qnaComments.partial.create', ['parentId' => $comment->id])
        @endif
        <hr>
        @forelse($comment->replies as $reply)
            @include('qnaComments.partial.comment', [
                'comment' => $reply,
                'isReply' => true,
            ])
        @empty
        @endforelse
    </div>
</div>
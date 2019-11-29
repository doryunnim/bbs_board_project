<div class="media item__comment {{ $isReply ? 'sub' : 'top' }}"
    data-id="{{ $comment->id }}" id="comment_{{ $comment->id }}">

    <div class="media-body">
        <h5 calss="media-heading">
            <a href="{{ $comment->user->email }}">
                {{ $comment->user->name }}
            </a>
            <small>
                {{ $comment->created_at->diffForHumans() }}
            </small>
        </h5>

        <div class="content__comment">
            {!! markdown($comment->content) !!}
        </div>

        <div class="action_comment">
            @can('update', $comment)
                <button class="btn__delete__comment">삭제</button>
                <button class="btn__edit__comment">수정</button>
            @endcan
            @if($currentUser)
                <button class="btn__reply__comment">쓰기</button>
            @endif

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


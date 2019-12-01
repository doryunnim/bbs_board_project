<div class="media media__create__comment {{ isset($parentId) ? 'sub' : 'top' }}">

    <div class="media-body">
        <form method="POST" action="{{ route('qnaArticles.qnaComments.store', $qnaArticle->id) }}" class="form-horizontal">
            @csrf 

            @if(isset($parentId))
                <input type="hidden" name="parent_id" value="{{ $parentId }}">   
            @endif

            <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                <textarea name="content" class="form-control" rows="3">{{ old('content') }}</textarea>
                {!! $errors->first('content', '<span class="form-error">:message</span>') !!}

            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary btn-sm">전송</button>
            </div>
        </form>
    </div>
</div>
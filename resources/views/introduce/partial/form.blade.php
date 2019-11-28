<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
    <label for="name">이름</label>
    <input type="text" name="title" id="title" value="{{old('title', $qnaArticle->title)}}" class="form-control" />
        {!! $errors->first('title', '<span class="form-error">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('comment') ? 'has-error' : '' }}">
    <label for="comment">한마디</label>
    <textarea name="comment" id="comment" rows="10" class="form-control">{{old('comment', $introduce->comment)}}</textarea>
        {!! $errors->first('comment', '<span class="form-error">:message</span>') !!}
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">수정</button>
</div>
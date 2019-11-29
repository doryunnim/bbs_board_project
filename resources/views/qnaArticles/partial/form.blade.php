<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
    <label for="title">제목</label>
    <input type="text" name="title" id="title" value="{{old('title', $qnaArticle->title)}}" class="form-control" />
        {!! $errors->first('title', '<span class="form-error">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
    <label for="content">내용</label>
    <textarea name="content" id="content" rows="10" class="form-control">{{old('content', $qnaArticle->content)}}</textarea>
        {!! $errors->first('content', '<span class="form-error">:message</span>') !!}
</div>

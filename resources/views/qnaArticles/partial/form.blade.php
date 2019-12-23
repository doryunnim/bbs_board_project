<div class="form-group">
    <label for="title">제목</label>
    <input type="text" name="title" id="title" value="{{old('title', $qnaArticle->title)}}" class="form-control" />
</div>

<div class="form-group">
    <label for="content">내용</label>
    <textarea name="content" id="content" rows="10" class="form-control">{{old('content', $qnaArticle->content)}}</textarea>
</div>

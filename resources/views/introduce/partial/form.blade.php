<div class="form-group {{ $errors->has('url') ? 'has-error' : '' }}">
    <label for="photo">파일</label>
    <input type="file" name="url" id="url" value="{{old('url', $introduce->url)}}" class="form-control" />
    {!! $errors->first('url', '<span class="form-error">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name">이름</label>
    <input type="text" name="name" id="name" value="{{old('name', $introduce->name)}}" class="form-control" />
    {!! $errors->first('name', '<span class="form-error">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('comment') ? 'has-error' : '' }}">
    <label for="comment">한마디</label>
    <textarea name="comment" id="comment" rows="10" class="form-control">{{old('comment', $introduce->comment)}}</textarea>
    {!! $errors->first('comment', '<span class="form-error">:message</span>') !!}
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">수정</button>
</div>
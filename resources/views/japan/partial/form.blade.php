<!-- old(): edit할 때 기존 값들을 채우기 위해 사용 / 첫 번째 인자로 받은 키가 세션에 없으면 두 번째 인자로 받은 기본 값을 출력한다 
            두 번째 인자는 각 필드에 해당하는 모델의 프로퍼티 값 -->

<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
    <label for="title">제목</label>
    <input type="text" name="title" id="title" value="{{old('title', $japan->title)}}" class="form-control" />
        {!! $errors->first('title', '<span class="form-error">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
    <label for="content">내용</label>
    <textarea name="content" id="content" rows="10" class="form-control">{{old('content', $japan->content)}}</textarea>
        {!! $errors->first('content', '<span class="form-error">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
    <label for="password">비밀번호</label>
    <input type="password" name="password" id="password" value="{{old('password', $japan->password)}}" class="form-control" />
        {!! $errors->first('password', '<span class="form-error">:message</span>') !!}
</div>

<!-- 파일 탐색기 떴을 때 이미지 여러 개 올릴 수 있음(드래그?, 컨트롤+클릭) -->
<div class="form-group form-control {{ $errors->has('imgs') ? 'has-error' : '' }}">
    <label for="image">파일 업로드</label>
    <input type="file" name="imgs[]" id="imgs" class="file" multiple="multiple"/>
        {!! $errors->first('imgs.0', '<span class="form-error">:message</span>') !!}
</div>
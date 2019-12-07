<form id="createJapan" method="post" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="form-group">
        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
        <label for="title">제목</label>
        <input type="text" name="title" id="title" class="form-control" />
            {!! $errors->first('title', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
            <label for="content">내용</label>
            <textarea name="content" id="content" rows="10" class="form-control"></textarea>
                {!! $errors->first('content', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            <label for="password">비밀번호</label>
            <input type="password" name="password" id="password" class="form-control" />
                {!! $errors->first('password', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('imgs') ? 'has-error' : '' }}">
            <label for="image">파일 업로드</label>
            <input type="file" name="imgs[]" id="imgs" multiple="multiple"/>
                {!! $errors->first('imgs.0', '<span class="form-error">:message</span>') !!}
        </div>
        <button id="saveBtn" class="updateBtn">저장</button>
    </div>
</form>
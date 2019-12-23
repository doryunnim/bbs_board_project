<form id="createJapan" method="post" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="form-group">
        <div class="form-group">
        <label for="title">제목</label>
        <input type="text" name="title" id="title" class="form-control" />
        </div>

        <div class="form-group">
            <label for="content">내용</label>
            <textarea name="content" id="content" rows="10" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="password">비밀번호</label>
            <input type="password" name="password" id="password" class="form-control" />
        </div>

        <div class="form-group">
            <label for="image">파일 업로드</label>
            <input type="file" name="imgs[]" id="imgs"/>
        </div>
    </div>
    <button id="saveBtn" class="updateBtn">저장</button>
</form>
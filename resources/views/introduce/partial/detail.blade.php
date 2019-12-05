<div class="col-md-4">
    <img src="{{ $introduce->url }}" class="img-fluid">
    <h4>{{ $introduce->name }}</h4>
    <h3>{{ $introduce->comment }}</h3>

    <button class="btn btn-primary btn__update" id="{{ $introduce->id }}">
        <i class="fa fa-trash-o"></i> 수정
    </button>
    <button class="btn btn-danger btn__delete" id="{{ $introduce->id }}">
        <i class="fa fa-trash-o"></i> 삭제
    </button>
</div>
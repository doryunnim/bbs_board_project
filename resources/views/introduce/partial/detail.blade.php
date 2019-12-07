<div class="col-md-4" id="detail_member{{ $introduce->id }}">
    <img id="detail_image{{ $introduce->id }}" src="{{ URL::to('/') }}/img/{{ $introduce->image }}" class="img-fluid">
    <h4 id="detail_name{{ $introduce->id }}">{{ $introduce->name }}</h4>
    <h3 id="detail_comment{{ $introduce->id }}">{{ $introduce->comment }}</h3>
   
    <button class="btn btn-primary btn__update" id="{{ $introduce->id }}">
        <i class="fa fa-trash-o"></i> 수정
    </button>
    <button class="btn btn-danger btn__delete" id="{{ $introduce->id }}">
        <i class="fa fa-trash-o"></i> 삭제
    </button>
</div>
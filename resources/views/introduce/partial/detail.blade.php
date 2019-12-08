<div class="col-md-12" id="detail_member{{ $introduce->id }}" style=text-align:center;>
    <br>
    <img id="detail_image{{ $introduce->id }}" src="{{ URL::to('/') }}/img/{{ $introduce->image }}" class="img-fluid" width="400" height="300">
    <h2 id="detail_name{{ $introduce->id }}">{{ $introduce->name }}</h2>
    <p id="detail_comment{{ $introduce->id }}">{{ $introduce->comment }}</p>
    @can('update', $introduce)
        <button class="btn btn-primary btn__update" id="{{ $introduce->id }}">
            <i class="fa fa-trash-o"></i> 수정
        </button>
    @endcan
    @can('delete', $introduce)
        <button class="btn btn-danger btn__delete" id="{{ $introduce->id }}">
            <i class="fa fa-trash-o"></i> 삭제
        </button>
    @endcan
</div>
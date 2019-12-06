<div class="col-md-2" id="{{ $introduce->id }}">> 
    <div class="w3-container">
        <div class="w3-card" style="width:150px; height:150px">
            <img src="{{ URL::to('/') }}/img/{{ $introduce->image }}" id=index_image style="width:150px; height:118px">
            <div class="w3-container">
                <h4 id=index_name>{{ $introduce->name }}</h4>
            </div>
        </div>
    </div>
    <br>
</div>
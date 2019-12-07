<<<<<<< HEAD
<div class="col-md-2" id="index_member{{ $introduce->id }}">> 
=======
<div class="col-md-2" id="index_member{{ $introduce->id }}"> 
>>>>>>> Japan
    <div class="w3-container">
        <div class="w3-card" style="width:150px; height:150px">
            <img src="{{ URL::to('/') }}/img/{{ $introduce->image }}" id="index_image{{ $introduce->id }}" style="width:150px; height:118px">
            <div class="w3-container">
                <h4 id="index_name{{ $introduce->id }}">{{ $introduce->name }}</h4>
            </div>
        </div>
    </div>
    <br>
</div>
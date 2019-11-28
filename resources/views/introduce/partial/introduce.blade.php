<div class="col-md-4">
    <a href="{{route('introduces.show', $introduce->id)}}">
        <img src="{{ $introduce->url }}" class="img-fluid">
        <h4>{{ $introduce->name }}</h4>
        <h3>{{ $introduce->comment }}</h3>
    </a>
</div>
<div class="media">
    <div class="media-body">
        <h4 class="media-heading">
            <!-- <a href="{{route('japan.show', $japan->id)}}" class="btn btn-primary title btn-show" id="title" data-all="{{$japan}}"  data-img="{{$japan->attachments}}">
                {{$japan->title}}
            </a> -->
            <button type="button" class="btn btn-primary japan__show" data-all="{{$japan}}" data-id="{{$japan->id}}" data-img="{{$japan->attachments}}">
                {{$japan->title}}
            </button>
        </h4>
    </div>
</div>
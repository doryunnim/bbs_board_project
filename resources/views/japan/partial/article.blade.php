<!-- <div class="media">
    <div class="media-body">
        <h4 class="media-heading">
            <a href="{{route('japan.show', $japan->id)}}">
                {{$japan->title}}
            </a>
        </h4>
    </div>
</div> -->
@if($japan->attachments->count())
    <ul class="attachment__article">
        @foreach($japan->attachments as $attachment)
            <li>
                <a href="{{$attachment->url}}">{{$attachment->filename}}</a>
            </li>
        @endforeach
    </ul>
@endif
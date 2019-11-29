<div class="media">
    <div class="media-body">
        <h4 class="media-heading">
            {{--@if($japan->attachments->count()))    
                @foreach($japan->attachments as $attachment)
                <a href="{{route('japan.show',$japan->id}}" class="btn" 
                    style="background-image: url({{$attachment->filename}});background-position:center; 
                    background-size:cover;">{{$attachment->filename}}</a>
                @endforeach
            @else
                <a href="{{route('japan.show', $japan->id)}}" class="btn">
                {{$japan->title}}
                </a>    
            @endif--}}
            <a href="{{route('japan.show', $japan->id)}}" class="btn btn-primary">
                {{$japan->title}}
            </a>  
        </h4>
    </div>
</div>
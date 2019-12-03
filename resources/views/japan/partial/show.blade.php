
@if($japan->attachments->count())
    <ul class="attachment__article">
        @foreach($japan->attachments as $attachment)
            <img src="{{ $attachment->filename }}" class="img-fluid">
        @endforeach
    </ul>
@endif

<div class="page-header">
    <h3 class="title">{{$japan->title}}</h3>
</div>

<small class="text-right">{{$japan->created_at}}</small>

<article class="m-b" data-id="{{$japan->id}}" data-password="{{$japan->password}}">
    <h5>{!! markdown($japan->content) !!}</h5>
</article>

<div class="action__article">
    <button class="btn btn-info button__edit offset-9-5" >수정</button>
    <button class="button__delete btn btn-danger del-btn">삭제</button>
</div>
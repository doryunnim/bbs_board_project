<div class="media">
    <div class="media-body">
        <h4 class="media-heading"> </h4>
        <a href="{{route('qnaArticles.show', $article->id)}}">
            <h5>{{$article->title}}</h5>
        </a>
        <p class="text-muted"sa>
            <i class="fa fa-user"></i> {{ $article->user->name }}
            <i class="fa fa-clock-o"></i> {{ $article->created_at->diffForHumans() }}
        </p>
    </div>
</div>
<div class="page-header">
    <h4>댓글</h4>
</div>
<!-- 새로운 댓글 작성 창 -->
<div class="form__new__comment" data-aos="fade" >
    @if($currentUser)
        <!-- 댓글 작성 폼 -->
        @include('qnaComments.partial.create')
    @else
        @include('qnaComments.partial.login')
    @endif
</div>
<!-- 기존 댓글 창 -->
<div class="list__comment" data-aos="fade-down">
    @forelse($qnaComments as $comment)
        @include('qnaComments.partial.comment', [
            'parentId' => $comment->id,
            'isReply' => false,
        ])
    @empty
    @endforelse
    
</div>
@section('script')
    @parent
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
        $(document).ready(function(){
            var create_box = $('.top').get(0);
            $(create_box).css('display', 'block');
        });
    </script>
@endsection
<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\QnaCommentsRequest;
use App\Qna_comment;
use App\Qna_article;

class QnaCommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(QnaCommentsRequest $request, Qna_article $qnaArticle)
    {
        $comment = $qnaArticle->qna_comments()->create(array_merge(
            $request->all(),
            ['user_id'=> $request->user()->id]
        ));

        return redirect(
            route('qnaArticles.show', $qnaArticle->id).'#comment_'.$comment->id
        );
    }

    public function update(QnaCommentsRequest $request, Qna_comment $comment)
    {
        $comment->update($request->all());

        return redirect(route('qnaArticles.show', $comment->commentable->id). '#comment_'.$comment->id);
    }

    public function destroy(Qna_comment $comment)
    {
        $comment->delete();

        return response()->json([], 204, [], JSON_PRETTY_PRINT);
    }
}

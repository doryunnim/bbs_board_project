<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\QnaCommentsRequest;
use App\Qna_comment;
use App\Qna_article;
use Validator;

class QnaCommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show',]]);

    }

    public function store(Request $request, Qna_article $qnaArticle)
    {
        $qnaArticle->qna_comments()->create(array_merge(
            $request->all(),
            ['user_id'=> $request->user()->id]
        ));
        $comment = $qnaArticle->qna_comments()->latest()->first();
        $isReply = $comment->parent_id;
        $view = view('qnaComments.partial.comment', compact('comment', 'isReply'))->render();

        return response()->json(['html'=>$view]);
    }
    public function update(Request $request, Qna_comment $qnaComment)
    {
        $qnaComment->update($request->all());
        
        return response()->json();
    }
    public function destroy(Qna_comment $qnaComment)
    {
        $qnaComment->delete();
        return response()->json([], 204, [], JSON_PRETTY_PRINT);
    }

}
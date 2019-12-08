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

        // $request->validate([
        //     'content' => ['required'],
        //     'parent_id' => ['numeric', 'exists:qna_comments,id'],
        // ]);

        $comment = $qnaArticle->qna_comments()->create(array_merge(
            $request->all(),
            ['user_id'=> $request->user()->id]
        ));

        // return response()->json(($comment), 204);

        // return redirect(
        //     route('qnaArticles.show', $qnaArticle->id).'#comment_'.$comment->id
        // );
    }
    public function update(Request $request, Qna_comment $qnaComment)
    {
        $qnaComment->update($request->all());
        
        return response()->json(array(
            'status'=>'success',
        ), 204);
    }
    public function destroy(Qna_comment $qnaComment)
    {
        $qnaComment->delete();
        return response()->json([], 204, [], JSON_PRETTY_PRINT);
    }

}
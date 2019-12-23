<?php

namespace App\Http\Controllers;

use App\Qna_article;
use Illuminate\Http\Request;

class QnaArticlesController extends Controller
{
    public function index()
    {
        // 즉시 로드
        // $qnaArticles = \App\Qna_article::with('user')->get();
        // 지연 로드
        // $qnaArticles = \App\Qna_article::get();
        // $qnaArticles->load('user');
        // 페이징
        $qnaArticles = \App\Qna_article::latest()->paginate(5);
        return view('qnaArticles.index', compact('qnaArticles'));
    }

    public function create()
    {
        return view("qnaArticles.create");
    }

    public function store(\App\Http\Requests\QnaArticlesRequest $request)
    {
        $qnaArticle = $request->user()->qna_articles()->create($request->all());
        // 성공적으로 저장되면 변수에 새로운 인스턴스 추가
        return redirect(route('qnaArticles.index'))->with('flash_message', '글이 저장되었습니다.');
    }


    public function show(Qna_article $qnaArticle)
    {
        //qnaArticle 글하나만 불러옴 밑에 qnaArticles 글 여러개 불러옴
       // $qnaArticles = \App\Qna_article::get();

        $qnaComments = $qnaArticle->qna_comments()->with('replies')->whereNull('parent_id')->latest()->get();
        return view('qnaArticles.show', compact('qnaArticle', 'qnaComments'));
    }


    public function edit(Qna_article $qnaArticle)
    {
        return view('qnaArticles.edit', compact('qnaArticle'));
    }
 
    public function update(Request $request, Qna_article $qnaArticle)
    {
        $qnaArticle->update($request->all());
        return redirect(route('qnaArticles.show', $qnaArticle->id))->with('flash_message', '글이 수정되었습니다.');
    }


    public function destroy(Qna_article $qnaArticle)
    {   
        var_dump($qnaArticle);
        $qnaArticle->delete();
        return response()->json([],204);
    }
}

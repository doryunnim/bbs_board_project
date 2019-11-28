<?php

namespace App\Http\Controllers;

use App\Qna_article;
use Illuminate\Http\Request;

class QnaArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show',]]);
    }

    public function index()
    {
        // 즉시 로드
        // $qnaArticles = \App\Qna_article::with('user')->get();
        // 지연 로드
        // $qnaArticles = \App\Qna_article::get();
        // $qnaArticles->load('user');
        // 페이징
        $qnaArticles = \App\Qna_article::latest()->paginate(3);
        return view('qnaArticles.index', compact('qnaArticles'));
    
    }

    public function create()
    {
        $qnaARticle = new \App\Qna_article;
        return view("qnaArticles.create", compact('article'));
    }

    public function store(\App\Http\Requests\QnaArticlesRequest $request)
    {
        // $rules = [
        //     'title'=>['required'],
        //     'content'=>['required'],
        // ];

        // $messages = [
        //     'title.required' => '제목은 필수예요!',
        //     'content.required' => '본문은 필수예요!',
        //     'content.min' => '본문은 최소 :min 글자 이상이 필요합니다.',
        // ];

        // // 유효성 검사 인스턴스 생성 (검사 대상 폼 데이터, 검사 규칙 ...)
        // // $validator = \Validator::make($request->all(), $rules, $messages);

        // // if($validator->fails()){ // 유효성 통과 실패시 true 반환
        // //     return back()->withErrors($validator)->withInput();
        // // }
        // $this->validate($request, $rules, $messages);

        // $qnaArticles = \App\Qna_article::find(1)->create($request->all());

        // $qnaArticles = \App\User::find(1)->qna_article()->create($request->all());
        $qnaArticle = $request->user()->qna_article()->create($request->all());
        // 성공적으로 저장되면 변수에 새로운 인스턴스 추가
        if(!$qnaArticles){
            return back()->with('flash_message', '글이 저장되지 않았데스케레도모...')->withInput();
        }
        return redirect(route('qnaArticles.index'))->with('flash_message', '글이 저장되었습니다.');
    }


    public function show(Qna_article $qnaArticle)
    {
        //qnaArticle 글하나만 불러옴 밑에 qnaArticles 글 여러개 불러옴
        // $qnaArticles = \App\Qna_article::get();
        return view('qnaArticles.show', compact('qnaArticle'));
    }


    public function edit(Qna_article $qnaArticle)
    {
        $this->authorize('update', $article);
        // return view('qnaArticles.edit', compact('qnaArticle'));
    }


    public function update(Request $request, Qna_article $qnaArticle)
    {
        $qnaArticle->update($request->all());
        return redirect(route('qnaArticles.show', $qnaArticle->id))->with('flash_message', '글이 수정되었습니다.');
    }


    public function destroy(Qna_article $qnaArticle)
    {
        $this->authorize('update', $article);
        // $qnaArticle->delete();
        // return response()->json([],204);
    }
}

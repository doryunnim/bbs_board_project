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
        $qnaArticles = \App\Qna_article::latest()->paginate(3);
        return view('qnaArticles.index', compact('qnaArticles'));
    
    }

    public function create()
    {
        return view("qnaArticles.create");
    }

    public function store(Request $request)
    {
        $rules = [
            'title'=>['required'],
            'content'=>['required'],
        ];

        $validator = \Validator::make($request->all(), $rules);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        // $qnaArticles = \App\Qna_article::find(1)->create($request->all());
        $qnaArticles = \App\User::find(1)->qna_article()->create($request->all());

        if(!$qnaArticles){
            return back();
        }

        return redirect(route('qnaArticles.index'));
    }


    public function show(Qna_article $qnaArticle)
    {
        //qnaArticle 글하나만 불러옴 밑에 qnaArticles 글 여러개 불러옴
        $qnaArticles = \App\Qna_article::get();
        return view('qnaArticles.show', compact('qnaArticle', 'qnaArticles'));
    }


    public function edit(Qna_article $qnaArticle)
    {
        //
        return view('qnaArticles.edit', compact('qnaArticle'));
    }

    public function update(Request $request, Qna_article $qnaArticle)
    {
        //
        $qnaArticle->update($request->all());
        return redirect(route('qnaArticles.show', $qnaArticle->id));
    }

 
    public function destroy(Qna_article $qnaArticle)
    {
        //
        $qnaArticle->delete();
        return response()->json([],204);
    }
 }

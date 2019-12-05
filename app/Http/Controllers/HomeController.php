<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NabeIntroduce;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $introduces = NabeIntroduce::all();
        $japans = \App\NabeJapan::oldest()->paginate(5);
        $qnaArticles = \App\Qna_article::latest()->paginate(5);
        return view('main',compact('introduces','japans','qnaArticles'));
    }
}

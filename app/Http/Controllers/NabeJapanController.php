<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\NabeJapan;

class NabeJapanController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = \App\NabeJapan::oldest()->paginate(100);
        return view('japan.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("japan.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title'=>['required'],
            'content'=>['required'],
            'password'=>['required', 'min:4']
        ];

        $validator = \Validator::make($request->all(), $rules);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $japan = \App\NabeJapan::create($request->all());

        if(!$japan){
            return back();
        }

        return redirect(route('japan.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NabeJapan  $article
     * @return \Illuminate\Http\Response
     */
    public function show(NabeJapan $japan)
    {
        //
        $articles = \App\NabeJapan::get();
        return view('japan.show', compact('japan', 'articles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NabeJapan  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(NabeJapan $japan)
    {
        //
        // $this->authorize('update', $japan);
        return view('japan.edit', compact('japan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NabeJapan  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NabeJapan $japan)
    {
        //
        // $this->authorize('update', $japan);
        $japan->update($request->all());
        return redirect(route('japan.show', $japan->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NabeJapan  $NabeJapan
     * @return \Illuminate\Http\Response
     */
    public function destroy($japan)
    {
        $japan->delete();

        return redirect(route('japan.index'));
    }
}

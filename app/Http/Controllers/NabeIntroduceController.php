<?php

namespace App\Http\Controllers;

use App\NabeIntroduce;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NabeIntroduceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('introduce.main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NabeIntroduce  $nabeIntroduce
     * @return \Illuminate\Http\Response
     */
    public function show(NabeIntroduce $nabeIntroduce)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NabeIntroduce  $nabeIntroduce
     * @return \Illuminate\Http\Response
     */
    public function edit(NabeIntroduce $nabeIntroduce)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NabeIntroduce  $nabeIntroduce
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NabeIntroduce $nabeIntroduce)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NabeIntroduce  $nabeIntroduce
     * @return \Illuminate\Http\Response
     */
    public function destroy(NabeIntroduce $nabeIntroduce)
    {
        //
    }
}

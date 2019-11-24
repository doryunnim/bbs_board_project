<?php

namespace App\Http\Controllers;

use App\NabeIntroduce;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NabeIntroduceController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('introduce.create');
    }

    public function store(Request $request)
    {
        #file에 사진이 있는지 확인하고 없으면 에러
        if(!$request->file('photo')) {
            return redirect()->back()->withErrors([
                'error' => "사진을 업로드 하세요"
            ]);
        }
        
        #Store
        $path = $request->file('photo')->store('public');

        #사진넣기
        $photo = NabeIntroduce::create([
            'name' => $request->name,
            'comment' => $request->comment,
            'url' => Storage::url($path),
            'hashname' => $request->file('photo')->hashName(),
            'originalname' => $request->file('photo')->getClientOriginalName()
        ]);

        #사진 처리 완료되면 실행됨
        return redirect()->back()->with([
            'id' => $photo->id,
            'status' => "photo has been uploaded",
        ]);
    }

    public function show(NabeIntroduce $nabeIntroduce)
    {
        
    }

    public function edit(NabeIntroduce $nabeIntroduce)
    {
        //
    }

    public function update(Request $request, NabeIntroduce $nabeIntroduce)
    {
        //
    }

    public function destroy(NabeIntroduce $nabeIntroduce)
    {
        //
    }
}

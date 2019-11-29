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
<<<<<<< HEAD
        return view('introduce.index');
=======
        $introduces = NabeIntroduce::all();
        return view('introduce.index', compact('introduces'));
>>>>>>> f773e4ceb2ae734a12587f5b4fccd8893328f718
    }

    public function create()
    {
<<<<<<< HEAD
        return view('introduce.create');
=======
        $introduce = new NabeIntroduce;
        return view('introduce.create', compact('introduce'));
>>>>>>> f773e4ceb2ae734a12587f5b4fccd8893328f718
    }

    public function store(Request $request)
    {
<<<<<<< HEAD
        #file에 사진이 있는지 확인하고 없으면 에러
=======
>>>>>>> f773e4ceb2ae734a12587f5b4fccd8893328f718
        if(!$request->file('photo')) {
            return redirect()->back()->withErrors([
                'error' => "사진을 업로드 하세요"
            ]);
        }
<<<<<<< HEAD
        
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
        return redirect('/introduce');
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
=======
        #Store 사진 저장경로
        $path = $request->file('photo')->store('public');
        $data = [
            'name' => $request->name,
            'comment' => $request->comment,
            'url' => Storage::url($path),
        ];
        $introduce = $request->user()->nabe_introduce()->create($data);
        if(!$introduce){
            return back()->with('flash_message', '인적사항이 저장되지 않았데스..')->withInput();
        }
        #사진 처리 완료되면 실행됨
        return redirect(route('introduces.index'))->with('flash_message', '정보가 저장되었습니다.');
    }

    public function show(NabeIntroduce $introduce)
    {
        return view('introduce.show', compact('introduce'));   
    }

    public function edit(NabeIntroduce $introduce)
    {
        return view('introduce.edit', compact('introduce'));
    }

    public function update(Request $request, NabeIntroduce $introduce)
    {
        #file에 사진이 있는지 확인하고 없으면 에러
        if(!$request->file('url')) {
            return back()->with('flash_message', '사진 안넣으면 수정안해줌');
        }
        #edit에서 수정파일의 경로를 다시 지정
        $path = $request->file('url')->store('public');
        
        $data = [
            'name' => $request->name,
            'comment' => $request->comment,
            'url' => Storage::url($path),
        ];
        $introduce->update($data);

        return redirect()->route('introduces.index');
    }
     
    public function destroy(NabeIntroduce $introduce)
    {
        $introduce->delete();
        return response()->json([], 204);
        #return redirect()->route('introduces.index')->with('flash_message', '삭제 성공');
>>>>>>> f773e4ceb2ae734a12587f5b4fccd8893328f718
    }
}

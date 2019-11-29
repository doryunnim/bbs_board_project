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
        $introduces = NabeIntroduce::all();
        return view('introduce.index', compact('introduces'));
    }

    public function create()
    {
        $introduce = new NabeIntroduce;
        return view('introduce.create', compact('introduce'));
    }

    public function store(Request $request)
    {
        if(!$request->file('photo')) {
            return redirect()->back()->withErrors([
                'error' => "사진을 업로드 하세요"
            ]);
        }
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
    }
}

<?php

namespace App\Http\Controllers;

use App\NabeIntroduce;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class NabeIntroduceController extends Controller
{
    public function index()
    {
        $introduces = NabeIntroduce::all();
        return view('introduce.index', compact('introduces'));
    }

    public function create()
    {
        return view('introduce.create');
    }

    public function store(Request $request)
    {
        if (!$request->file('image')) {
            return redirect()->back()->withErrors([
                'error' => "사진을 업로드 하세요"
            ]);
        } elseif (!$request->name) {
            return redirect()->back()->withErrors([
                'error' => "이름을 입력하세요"
            ]);
        } elseif (!$request->comment) {
            return redirect()->back()->withErrors([
                'error' => "한마디를 꼭"
            ]);
        }
        #Store 사진 저장경로
        $path = $request->file('image')->store('public');

        $data = [
            'name' => $request->name,
            'comment' => $request->comment,
            'url' => $path,
        ];
        $introduce = $request->user()->nabe_introduce()->create($data);
        if (!$introduce) {
            return back()->with('flash_message', '인적사항이 저장되지 않았데스..')->withInput();
        }
        return redirect()->route('introduces.index');
    }

    public function show($id)
    {
        $data = NabeIntroduce::where('id', $id)->with('user')->get();
        return response()->json($data);
    }

    public function edit($id)
    {
       //
    }

    public function update(Request $request, NabeIntroduce $introduce)
    {
        //$path = $request->file('image')->store('public');
        // $Newdata = [
        //     'name' => $request->name,
        //     'comment' => $request->comment,
        //     'url' => $request->url,
        // ];
        $introduce->update($request->all());
        return response()->json([], 204);
    }
    
    public function destroy(NabeIntroduce $introduce)
    {
        $introduce->delete();
        return response()->json([], 204);
        #return redirect()->route('introduces.index')->with('flash_message', '삭제 성공');
    }
}
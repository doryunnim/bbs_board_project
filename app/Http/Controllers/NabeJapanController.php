<?php

namespace App\Http\Controllers;

use App\Http\Requests\JapanRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

use App\NabeJapan;
use App\JapanAttachments;
use File;

class NabeJapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $japans = \App\NabeJapan::oldest()->paginate(5);   //오래된 순으로 불러서 기본 10개씩 보기
        $jpIds = \App\NabeJapan::pluck('id');       //id 값 배열
        
        return view('japan.index', compact('japans', 'jpIds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(NabeJapan $japans)
    {
        // return view("japan.create", compact('japan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $japan = \App\NabeJapan::create($request->all());

        // $rules = [  
        //     'title'=>['required'],
        //     'content'=>['required'],
        //     'password'=>['required', 'min:4'],
        //     'files'=>['required'],
        // ];
        // $messages=[
        //     'title.required'=>'제목을 적어주세요.',
        //     'content.required'=>'본문을 적어주세요.',
        //     'password.required'=>'비밀번호를 적어주세요',
        //     'password.min'=>'비밀번호는 4자 이상 적어주세요',
        //     'files.required'=>'사진을 추가해 주세요',
        // ];
        // $validator = \Validator::make($request->all(), $rules, $messages);
        
        // if($validator->fails()){
        //     return back()->withErrors($validator)->withInput();
        // }
     

        if($request->hasFile('imgs')){
            $imgs = $request->file('imgs');
            foreach($imgs as $img){
                $imgName = $img->store('public');
                $japan->attachments()->create([
                    'filename'=>Storage::url($imgName),
                    'bytes'=>$img->getSize(),
                    'mime'=>$img->getClientMimeType()
                ]);
            }
        }

        if(!$japan){
            return back();
        }
        return redirect('/japan');
        // return response()->json($japan, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NabeJapan  $japan
     * @return \Illuminate\Http\Response
     */
    public function show(NabeJapan $japan)
    {
        //
        // $japans = \App\NabeJapan::get();
        // return view('japan.show', compact('japan', 'japans'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NabeJapan  $japan
     * @return \Illuminate\Http\Response
     */
    public function edit(NabeJapan $japan)
    {
        $files = $japan->attachments;
        return view('japan.edit', compact('japan', 'files'));
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
        if($request->hasFile('imgs')){
            $imgs = $request->file('imgs');

            foreach($imgs as $img){
                $imgName = $img->store('public');

                $japan->attachments()->update([
                    'filename'=>Storage::url($imgName),
                    'bytes'=>$img->getSize(),
                    'mime'=>$img->getClientMimeType()
                ]);
            }
        }
        $japan->update($request->all());
        return redirect('/japan');
        // return response()->json($japan, 200);
        // $request: {"_token":"i5YjriXCc1LydGOIswmq7mceAHHut0XkgknAIQtC","_method":"PUT","title":"","content":"","password":""}
        // $japan: {"id":,"title":"","content":"","":"","created_at":"","updated_at":""}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NabeJapan  $NabeJapan
     * @return \Illuminate\Http\Response
     */
    public function destroy($japan)
    {
        $this->deleteAttachments($japan->attachments);
        $japan->delete();
        return response()->json([], 200);   //첫번째 인자로 받은 배열을 json 형식으로 배열화
    }

    //글에 연결된 이미지 삭제
    public function deleteAttachments(Collection $attachmetns)
    {
        $attachmetns->each(function ($attachment) {
            $filePath = $attachment->filename;

            if (File::exists($filePath)) {      //$filename 경로에 파일이 있으면 지운다
                File::delete($filePath);
            }

            return $attachment->delete();
        });
    }
}

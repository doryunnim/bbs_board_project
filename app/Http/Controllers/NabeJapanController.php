<?php

namespace App\Http\Controllers;

use App\Http\Requests\NabeJapansRequest;
use App\Http\Requests\StoreBlogPost;
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
        $japans = \App\NabeJapan::oldest()->paginate(10);   //오래된 순으로 불러서 기본 10개씩 보기
        $jpIds = \App\NabeJapan::pluck('id');       //id 값 배열
        $jpImages = \App\JapanAttachments::with('japan')->get();
        
        return view('japan.index', compact('japans', 'jpIds','jpImages'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $japan = \App\NabeJapan::create($request->all());
     
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
        } else {
            return redirect()->back()->withErrors([
                'error' => "이미지를 업로드 하세요"
            ]);
        }

        if(!$japan){
            return back()->with('flash_message','글이 저장되지 않았습니다')->withInput();
        }

        return redirect('/japan')->with('flash_message', '글이 저장되었습니다.');
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

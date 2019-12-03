<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

use App\NabeJapan;
use File;

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
        $japans = \App\NabeJapan::oldest()->paginate(5);
        return view('japan.index', compact('japans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(NabeJapan $japan)
    {
        $japans = \App\NabeJapan::get();
        return view("japan.create", compact('japan','japans'));
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

        $rules = [
            'title'=>['required'],
            'content'=>['required'],
            'password'=>['required', 'min:4']
        ];

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

        $validator = \Validator::make($request->all(), $rules);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        if(!$japan){
            return back();
        }

        return redirect(route('japan.show', $japan->id));
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
        
        $japans = \App\NabeJapan::get();
        return view('japan.show', compact('japan', 'japans'));
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
        $japans = \App\NabeJapan::get();
        return view('japan.edit', compact('japan', 'japans'));
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
        $this->deleteAttachments($japan->attachments);
        $japan->delete();
        return response()->json([], 200);
    }

    public function deleteAttachments(Collection $attachmetns)
    {
        $attachmetns->each(function ($attachment) {
            $filePath = $attachment->filename;

            if (File::exists($filePath)) {
                File::delete($filePath);
            }

            return $attachment->delete();
        });
    }
}

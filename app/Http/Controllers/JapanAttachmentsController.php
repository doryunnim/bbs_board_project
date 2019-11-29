<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JapanAttachments;
use App\NabeJapan;

class JapanAttachmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $attachments = [];

        if($request->hasFile('files')) {
            $files = $request->file('files');

            foreach($files as $file) {
                $filename = filter_var($file->getClientOriginalName(), FILTER_SANITIZE_URL);
                $payload = [
                    'filename'=>$filename,
                    'bytes'=>$file->getClientSize(),
                    'mime'=>$file->getClientMimeType()
                ];

                $file->move(attachments_path(), $filename);

                $attachments[] = ($id = $request->input('nabe_japan_id')) ? \App\NabeJapan::findOrFail($id)->attachments->create($payload) : \App\JapanAttachments::create($payload);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $attachments = [];

        if($request->hasFile('files')) {
            $files = $request->file('files');

            foreach($files as $file) {
                $filename = filter_var($file->getClientOriginalName(), FILTER_SANITIZE_URL);
                $payload = [
                    'filename'=>$filename,
                    'bytes'=>$file->getClientSize(),
                    'mime'=>$file->getClientMimeType()
                ];

                $file->move(attachments_path(), $filename);

                $attachments[] = ($id = $request->input('nabe_japan_id')) ? \App\NabeJapan::findOrFail($id)->attachments->update($payload) : \App\JapanAttachments::update($payload);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

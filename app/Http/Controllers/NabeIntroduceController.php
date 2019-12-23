<?php

namespace App\Http\Controllers;

use App\NabeIntroduce;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

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
        if($request->hasfile("image"))
        {
            $image_name = "";
            $image = $request->file('image');
            $rules = array(
                'name'    =>  'required',
                'comment'     =>  'required',
            );
            $error = Validator::make($request->all(), $rules);
            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img'), $image_name);
        }
        else 
        {
            $rules = array(
                'name'    =>  'required',
                'comment'     =>  'required'
            );
            $error = Validator::make($request->all(), $rules);
            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
        }
        #Store 사진 저장경로
        $data = [
            'name' => $request->name,
            'comment' => $request->comment,
            'image' => $image_name,
        ];
        //NabeIntroduce::user()->nabe_introduce()->create($data);
        $introduce = $request->user()->nabe_introduce()->create($data);
        if (!$introduce) {
            return back()->with('flash_message', '인적사항이 저장되지 않았데스..')->withInput();
        }
        return redirect()->route('introduces.index');
    }

    public function show($id)
    {
        $data = NabeIntroduce::where('id', $id)->first();
        return response()->json($data);
    }

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
    public function update(Request $request)
    {   
        if($request->has("image"))
        {
            $image_name="";
            $image = $request->file('image');
            $rules = array(
                'name'    =>  'required',
                'comment'     =>  'required',
                'image'         =>  'image',
            );
            $error = Validator::make($request->all(), $rules);
            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img'), $image_name);
        }
        else 
        {
            $rules = array(
                'name'    =>  'required',
                'comment'     =>  'required'
            );
            $error = Validator::make($request->all(), $rules);
            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
        }
        $form_data = [
            'name'=> $request->name,
            'comment'=>$request->comment,
            'image'=>$image_name,
        ];
        $member_id = $request->get('hidden_id');
        $result = NabeIntroduce::whereId($member_id)->update($form_data);
        //$data = NabeIntroduce::where('id', $member_id)->with('user')->update($form_data);
        return response()->json([], 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(NabeIntroduce $introduce)
    {
        $introduce->delete();
        return response()->json([], 204);
    }
}
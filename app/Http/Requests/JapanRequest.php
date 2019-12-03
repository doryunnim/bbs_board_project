<?php

namespace App\Http\Requests;

use App\JapanAttachments;
use Illuminate\Foundation\Http\FormRequest;

class JapanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()     //인자
    {
        return false;
    }

    protected $dontFlash = ['files'];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'files'=>['array'],
            'files.*'=>['mimes:jpg', 'max:30000'],
        ];
    }

    public function message()
    {
        return [
            'required' => ':attribute 입력 필수',
            'min' => ':min 글자 이상 입력'
        ];
    }

    public function attributes()
    {
        return [
            'title' => '제목',
            'content' => '내용',
            'password' => '비밀번호',
            'img' => '이미지'
        ];
    }

    public function getAttachments()
    {
        return JapanAtachments::whereIn(
            'id',
            $this->input('attachments', [])
        )->get();
    }
}
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JapanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
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
            'title'=>['required'],
            'content'=>['required'],
            'password'=>['required', 'min:4'],
            'files'=>['required'],
            'files.*'=>['mimes:jpg', 'max:30000'],
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute을(를) 적어주세요',
            'min' => ':attribute은(는) 최소 :min 글자 이상 필요합니다.'
        ];
    }

    public function attributes()
    {
        return [
            'title' => '제목',
            'content' => '본문',
            'password' => '비밀번호',
            'files' => '이미지'
        ];
    }
}

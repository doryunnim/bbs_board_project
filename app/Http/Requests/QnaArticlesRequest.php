<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QnaArticlesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required'],
            'content' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute은(는) 필수 인데스케레도모...',
        ];
    }
    
    public function attributes()
    {
        return [
            'title' => '제목',
            'content' => '본문',
        ];
    }
}

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
            'files'=>['array'],
            'files.*'=>['mimes:jpg', 'max:30000'],
        ];
    }
}

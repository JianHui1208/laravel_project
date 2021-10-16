<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeJobRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>[
                'string',
                'required',
            ],
            'place'=>[
                'string',
                'required',
            ],
            'salary'=>[
                'integer',
                'required',
            ],
            'type'=>[
                'string',
                'required',
            ],
        ];
    }
}

<?php

namespace App\Http\Requests\Canal;

use Illuminate\Foundation\Http\FormRequest;

class StoreCanalRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if(config('default.dual_language'))
        {
            return [
                'title' => ['nullable'],
                'title_en' => ['nullable'],
                'photo' => ['required', 'image', 'mimes:png,jpg,jpeg']
            ];
        }
        else
        {
            return [
                'title' => ['nullable'],
                'photo' => ['required', 'image', 'mimes:png,jpg,jpeg']
            ];
        }

    }

}

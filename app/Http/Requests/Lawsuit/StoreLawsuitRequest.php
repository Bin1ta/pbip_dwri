<?php

namespace App\Http\Requests\Lawsuit;

use Illuminate\Foundation\Http\FormRequest;

class StoreLawsuitRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'type' => ['required'],
            'type_en' => ['required'],
            'bigo' => ['required'],
            'bigo_en' => ['required'],
            'fine' => ['required'],
            'jailed' => ['required'],
            'reg_date' => ['required'],
            'reg_body' => ['required'],
            'accused' => ['required'],
            'remarks' => ['required'],
            'remarks_en' => ['required'],
        ];
    }
}

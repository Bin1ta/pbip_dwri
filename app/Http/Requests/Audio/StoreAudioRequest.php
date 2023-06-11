<?php

namespace App\Http\Requests\Audio;

use Illuminate\Foundation\Http\FormRequest;

class StoreAudioRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        if(config('default.dual_language'))
        {
            return [
                'title' => ['nullable'],
                'title_en' => ['nullable'],
                'file' => ['required']
            ];
        }
        else
        {
            return [
                'title' => ['nullable'],
                'file' => ['required']
            ];
        }

    }
}

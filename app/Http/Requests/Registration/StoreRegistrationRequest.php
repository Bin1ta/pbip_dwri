<?php

namespace App\Http\Requests\Registration;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegistrationRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'reg_no' => ['required', 'string'],
            'date' => ['required', 'string'],
            'letter_count' => ['required', 'numeric'],
            'invoice_no' => ['required', 'string'],
            'rec_date' => ['required', 'string'],
            'sender_name' => ['required', 'string'],
            'address' => ['required', 'string'],
            'subject' => ['required', 'string'],
            'department' => ['required', 'string'],
            'photo' => ['required', 'image', 'mimes:png,jpg,jpeg'],
            'remarks' => ['required', 'string'],
        ];
    }
}

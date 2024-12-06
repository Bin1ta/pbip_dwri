<?php

namespace App\Http\Requests\Registration;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRegistrationRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'reg_no' => ['nullable', 'string'],
            'date' => ['nullable', 'string'],
            'letter_count' => ['nullable', 'numeric'],
            'invoice_no' => ['nullable', 'string'],
            'rec_date' => ['nullable', 'string'],
            'sender_name' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'subject' => ['nullable', 'string'],
            'department' => ['nullable', 'string'],
            'photo' => ['nullable',  'mimes:png,jpg,jpeg,pdf'],
            'remarks' => ['nullable', 'string'],
        ];
    }
}

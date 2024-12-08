<?php

namespace App\Http\Requests\Registration;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'user_id' => ['nullable',Rule::exists('users', 'id')->withoutTrashed()],
            'remarks' => ['nullable', 'string'],
            'docs' => ['nullable', 'array'],
            'docs.*' => ['file']
        ];
    }
}

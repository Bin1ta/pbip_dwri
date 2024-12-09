<?php

namespace App\Http\Requests\Invoice;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreInvoiceRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'invoice_no' => ['nullable', 'string'],
            'date' => ['nullable', 'string'],
            'letter_count' => ['nullable', 'numeric'],
            'rec_name' => ['nullable', 'string'],
            'subject' => ['nullable', 'string'],
            'deliver_type' => ['nullable', 'string'],
            'user_id' => ['nullable',Rule::exists('users', 'id')->withoutTrashed()],
            'remarks' => ['nullable', 'string'],
            'docs' => ['nullable', 'array'],
            'docs.*' => ['file', 'mimes:pdf,jpg,jpeg,png'],

        ];
    }
}

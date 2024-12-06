<?php

namespace App\Http\Requests\Invoice;

use Illuminate\Foundation\Http\FormRequest;

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
            'photo' => ['nullable','mimes:png,jpg,jpeg,pdf'],
            'remarks' => ['nullable', 'string'],
        ];
    }
}

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
            'invoice_no' => ['required', 'string'],
            'date' => ['required', 'string'],
            'letter_count' => ['required', 'numeric'],
            'rec_name' => ['required', 'string'],
            'subject' => ['required', 'string'],
            'deliver_type' => ['required', 'string'],
            'photo' => ['required', 'image', 'mimes:png,jpg,jpeg'],
            'remarks' => ['required', 'string'],
        ];
    }
}

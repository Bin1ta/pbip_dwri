<?php

namespace App\Http\Requests\ContractProgress;

use Illuminate\Foundation\Http\FormRequest;

class StoreContractProgressRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'work_name'=>['required', 'string'],
            'contract_id'=>['required', 'string'],
            'contractor_name'=>['required', 'string'],
            'contractor_amount'=>['required', 'numeric'],
            'agreement_date'=>['required', 'string'],
            'completion_date'=>['required', 'string'],
            'completion_date_due'=>['nullable', 'string'],
            'times_extended'=>['nullable', 'string'],
            'times_extended_reversed' => ['nullable', 'string'],
            'financial_progress_amount'=>['nullable', 'numeric'],
            'financial_progress_percent' => ['nullable', 'numeric'],
            'financial_progress_date'=>['nullable', 'string'],
            'physical_progress_percent' => ['required', 'numeric'],
            'physical_progress_date'=>['nullable','string'],
            'remarks'=>['nullable','string'],
            'progress_status' => ['nullable', 'boolean'],
        ];
    }
}

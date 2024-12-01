<?php

namespace App\Http\Requests\FinishedContract;

use App\Enums\ProjectTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class updateFinishedContractRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>['required','string'],
            'place_id'=>['required',new Enum(ProjectTypeEnum::class)],
            'work'=>['required','string'],
            'identification_no'=>['required','string'],
            'contractor_detail'=>['required','string'],
            'agreement_date'=>['required','string'],
            'agreement_amount'=>['required','string'],
            'completion_date'=>['required','string'],
            'actual_expenditure'=>['nullable','string'],
            'contractors_liability_status'=>['nullable','boolean'],
            'current_status'=>['nullable','boolean'],
            'work_completed'=>['nullable','string'],
        ];
    }
}

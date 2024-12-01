<?php

namespace App\Http\Requests\CurrentContract;

use App\Enums\ProjectTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StoreCurrentContractRequest extends FormRequest
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
            'completion_date'=>['required','string'],
            'agreement_amount'=>['required','numeric'],
            'extension_time'=>['nullable','string'],
            'extension_duration'=>['nullable','string'],
            'completion_date_revised'=>['nullable','string'],
            'current_status'=>['nullable', 'boolean'],
            'updated_progress'=>['nullable','string'],
            'authorised_person'=>['nullable','string'],
        ];
    }
}

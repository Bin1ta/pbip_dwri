<?php

namespace App\Http\Requests\TotalProgress;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTotalProgressRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'year'=>['required','string'],
            'periodicity'=>['required','string'],
            'financial_progress_periodic'=>['nullable','string'],
            'financial_progress_cumulative'=>['nullable','string'],
            'financial_progress_rs'=>['nullable','numeric'],
            'periodic_percentage'=>['nullable','numeric'],
            'yearly_percentage'=>['nullable','numeric'],
            'periodic_physical_progress'=>['nullable','string'],
            'periodic_physical_cumulative'=>['nullable','string'],
            'remarks'=>['nullable','string'],
        ];
    }
}

<?php

namespace App\Http\Requests\WorkPlan;

use App\Enums\MonthEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateWorkPlanProgressRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'year' => ['required', 'string',],
            'month' => ['required', new Enum(MonthEnum::class)],
            'detail' => ['nullable', 'string'],
            'quantity' => ['nullable', 'integer', 'min:0'],
            'first_quarterly_1' => ['nullable', 'integer', 'min:0'],
            'first_quarterly_2' => ['nullable', 'integer', 'min:0'],
            'first_quarterly_3' => ['nullable', 'integer', 'min:0'],
            'first_quarterly_4' => ['nullable', 'integer', 'min:0'],
            'second_quarterly_1' => ['nullable', 'integer', 'min:0'],
            'second_quarterly_2' => ['nullable', 'integer', 'min:0'],
            'second_quarterly_3' => ['nullable', 'integer', 'min:0'],
            'second_quarterly_4' => ['nullable', 'integer', 'min:0'],
            'third_quarterly_1' => ['nullable', 'integer', 'min:0'],
            'third_quarterly_2' => ['nullable', 'integer', 'min:0'],
            'third_quarterly_3' => ['nullable', 'integer', 'min:0'],
            'third_quarterly_4' => ['nullable', 'integer', 'min:0'],
            'monthly_progress' => ['nullable', 'integer', 'min:0'],
            'upto_month_progress' => ['nullable', 'integer', 'min:0'],
            'completed_word' => ['nullable', 'string'],
            'less_progress_reason' => ['nullable', 'string'],
        ];
    }
}

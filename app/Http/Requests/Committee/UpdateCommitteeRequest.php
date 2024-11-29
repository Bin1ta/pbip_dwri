<?php

namespace App\Http\Requests\Committee;

use App\Enums\ProjectTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class UpdateCommitteeRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'committee_category_id' => ['nullable', Rule::exists('committee_Categories', 'id')->withoutTrashed()],
            'name' => ['required','string'],
            'name_en' => ['required','string'],
            'place' => ['required',new Enum(ProjectTypeEnum::class)]
        ];
    }
}

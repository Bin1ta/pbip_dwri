<?php

namespace App\Http\Requests\ForestDetail;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreForestDetailRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'forest_category_id' => ['required',Rule::exists('forest_categories','id')->withoutTrashed()],
            'forest_name' => ['required'],
            'forest_name_en' => ['required'],
            'address' => ['required'],
            'address_en' => ['required'],
            'house_hold' => ['required'],
            'area' => ['required'],
            'approve_date' => ['required'],
            'end_date' => ['required'],
        ];
    }
}

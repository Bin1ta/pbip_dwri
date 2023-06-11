<?php

namespace App\Http\Requests\ForestCategory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreForestCategoryRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'=>['required','string','max:255'],
            'title_en'=>['required','string','max:255'],
            'slug' => ['required', 'alpha_dash', Rule::unique('forest_categories', 'slug')->withoutTrashed()],
        ];
    }
}

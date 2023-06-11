<?php

namespace App\Http\Requests\DocumentCategory;

use App\Models\DocumentCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDocumentCategoryRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if(config('default.dual_language'))
        {
            return [
                'title' => ['required'],
                'title_en' => ['required'],
                'position'=>['nullable'],
                'type' => ['nullable', Rule::unique('document_categories', 'type')->withoutTrashed()->ignore($this->documentCategory)],
                'slug' => ['required', 'alpha_dash', Rule::unique('document_categories', 'slug')->withoutTrashed()->ignore($this->documentCategory)],
            ];
        }
        else
        {
            return [
                'title' => ['required'],
                'type' => ['nullable', Rule::unique('document_categories', 'type')->withoutTrashed()->ignore($this->documentCategory)],
                'position'=>['nullable'],
                'slug' => ['required', 'alpha_dash', Rule::unique('document_categories', 'slug')->withoutTrashed()->ignore($this->documentCategory)],
            ];
        }

    }
}

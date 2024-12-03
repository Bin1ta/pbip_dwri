<?php

namespace App\Http\Requests\CommitteeMember;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCommitteeMemberRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['nullable', 'string'],
            'name_en' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'address_en' => ['nullable', 'string'],
            'phone' => ['nullable', 'string'],
            'photo' => ['nullable', 'image', 'mimes:jpg,png,jpeg'],
            'post' => ['nullable', 'string'],
            'post_en' => ['nullable', 'string'],
            'remarks' => ['nullable', 'string'],
            'committee_id' => ['nullable', Rule::exists('committees', 'id')->withoutTrashed()],

        ];

    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostTranslationRequest extends FormRequest
{
    public function rules()
    {
        return [
            'language_id' => [
                'required',
                Rule::exists('languages', 'id')->whereNull('deleted_at'),
            ],
            'post_id' => [
                'required',
                Rule::exists('posts', 'id')->whereNull('deleted_at'),
            ],
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'required|string',
        ];
    }
}

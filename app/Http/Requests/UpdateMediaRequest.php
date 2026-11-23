<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMediaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => [
                'sometimes',
                'required',
                'string',
                'max:255',
                Rule::unique('media', 'title')->ignore($this->route('media')),
            ],
            'genre' => 'sometimes|required|string|max:100',
            'year' => 'sometimes|required|integer|min:1900|max:2100',
            'type' => 'sometimes|required|in:anime,manga',
            'episodes' => 'nullable|integer|min:1',
            'chapters' => 'nullable|integer|min:1',
        ];
    }
}

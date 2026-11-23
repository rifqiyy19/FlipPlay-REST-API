<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMediaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255|unique:media,title',
            'genre' => 'required|string|max:100',
            'year' => 'required|integer|min:1900|max:2100',
            'type' => 'required|in:anime,manga',
            'episodes' => 'nullable|integer|min:1',
            'chapters' => 'nullable|integer|min:1',
        ];
    }
}
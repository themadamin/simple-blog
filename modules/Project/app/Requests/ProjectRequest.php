<?php

namespace Modules\Project\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => 'required|int|exists:categories,id',
            'title' => 'required|string|max:255',
            'body' => 'required|string|max:1000',
            'published_at' => 'nullable|date',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ];
    }
}

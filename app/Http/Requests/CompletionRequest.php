<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompletionRequest extends FormRequest
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
            'prompt' => 'required|string|max:1000',
            'model' => 'required|string|in:openai,gemini'
        ];
    }
}

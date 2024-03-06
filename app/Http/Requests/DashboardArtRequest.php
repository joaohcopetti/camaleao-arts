<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DashboardArtRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'category' =>  data_get($this, 'category.id')
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $isEdit = request()->method() === 'PATCH';
        $fileRules = ['file', 'extensions:cdr'];

        return [
            'name' => ['required'],
            'file' => $isEdit
                ? ['sometimes', 'nullable', 'file', 'extensions:cdr']
                : ['required', 'file', 'extensions:cdr'],
            'image' => $isEdit
                ? ['sometimes', 'nullable', 'file', 'extensions:jpg,png,jpeg']
                : ['required', 'file', 'extensions:jpg,png,jpeg'],
            'category' => ['required', 'exists:categories,id']
        ];
    }
}

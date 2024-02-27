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
        $isEdit = request()->routeIs('dashboard.arts.update');
        $fileRules = ['required', 'file', 'extensions:cdr'];

        return [
            'name' => ['required'],
            'file' => $isEdit ? ['sometimes', ...$fileRules] : $fileRules,
            'category' => ['required', 'exists:categories,id']
        ];
    }
}

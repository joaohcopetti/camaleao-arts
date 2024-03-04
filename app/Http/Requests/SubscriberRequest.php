<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubscriberRequest extends FormRequest
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
        $isEdit = request()->method() === 'PATCH';

        return [
            'name' => ['required'],
            'email' => ['required', Rule::unique('users')->ignore(request()->user)],
            'password' => $isEdit ? ['confirmed'] : ['required', 'confirmed'],
            'password_confirmation' => $isEdit ? [] : ['required'],
            'expire_at' => ['required', 'date']
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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

            'name' => ['string','required','max:50'],
            'email' => ['string','required','max:30','unique:users,email'],
            'password' => ['string','required','max:20','min:8'],

        ];
    }

    public function messages() : array{
        return [
            'name.required' => 'Name is required',
            'email.required'=> 'Email is required',
            'password.required'=> 'Password is required',
            'email.unique' => 'This email is already in use',
            'password.min'=> 'Password must be at least 8 characters',
        ];

    }
}

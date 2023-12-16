<?php

declare(strict_types=1);

namespace App\Http\Requests\V1\Auth;

use App\Http\Requests\BaseRequest;

/**
 * @property string $email
 * @property string $password
 */
class LoginRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required|string'
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email is required',
            'email.email' => 'Not valid email',
            'password.required' => 'Password required',
            'password.string' => 'Password mast be of string type'
        ];
    }
}

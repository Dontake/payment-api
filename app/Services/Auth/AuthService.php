<?php

declare(strict_types=1);

namespace App\Services\Auth;

use App\Repository\User\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService
{
    /**
     * @throws ValidationException
     */
    public function login(string $email, string $password): string
    {
        $user = UserRepository::byEmail($email);

        if (!Hash::check($password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $user->createToken('jwt')->plainTextToken;
    }
}

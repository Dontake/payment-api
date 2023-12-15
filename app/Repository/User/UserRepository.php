<?php

namespace App\Repository\User;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserRepository
{
    /**
     * @throws ModelNotFoundException
     */
    public static function byEmail(string $email): User
    {
        return User::query()->where('email', $email)->firstOrFail();
    }
}

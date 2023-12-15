<?php

namespace App\Http\Controllers\V1\Auth;

use App\Http\Controllers\V1\BaseController;
use App\Http\Requests\V1\Auth\LoginRequest;
use App\Http\Resources\V1\Auth\LoginResource;
use App\Services\Auth\AuthService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends BaseController
{
    /**
     * @throws ValidationException
     */
    public function login(LoginRequest $request, AuthService $service): LoginResource
    {
        return new LoginResource($service->login($request->email, $request->password));
    }

    public function logout(Request $request): void
    {
        $request->user()->currentAccessToken()->delete();
    }
}

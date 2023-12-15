<?php

namespace App\Exceptions\Api\V1;

class AuthException extends BaseException
{
    public function __construct(?string $message = null)
    {
        parent::__construct(
            __($message ?? 'Not authorized'),
            403
        );
    }
}

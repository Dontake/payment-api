<?php

declare(strict_types=1);

namespace App\Exceptions\Api\V1;

class InsufficientFundsException extends BaseException
{
    public function __construct(?string $message = null)
    {
        parent::__construct(
            __($message ?? 'Insufficient funds'),
            400
        );
    }
}

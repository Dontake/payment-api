<?php

namespace App\Exceptions\ExternalServices;

use App\Exceptions\Api\V1\BaseException;

class CurrencyRateSyncException extends BaseException
{
    public function __construct(?string $message = null)
    {
        parent::__construct(
            __($message ?? 'Currency rate sync failed!'),
            400
        );
    }
}

<?php

namespace App\Enums;

trait EnumJsonSerializableTrait
{
    use EnumArraySerializableTrait;

    public static function jsonSerialize(): string
    {
        return json_encode(static::array());
    }
}

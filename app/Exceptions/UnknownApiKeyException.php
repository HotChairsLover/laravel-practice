<?php

namespace App\Exceptions;

use App\Exceptions\Profile\BaseProfileException;

class UnknownApiKeyException extends BaseProfileException
{
    public function context(): array
    {
        $error = [
            'msg' => "apiKey не существует"
        ];
        return $error;
    }
}

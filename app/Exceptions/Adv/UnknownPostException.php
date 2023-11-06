<?php

namespace App\Exceptions\Adv;

class UnknownPostException extends BaseAdvException
{
    public function context(): array
    {
        $error = [
            'message' => "Не найдет пост",
        ];
        return $error;
    }
}

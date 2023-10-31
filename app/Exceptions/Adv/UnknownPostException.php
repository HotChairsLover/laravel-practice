<?php

namespace App\Exceptions\Adv;

class UnknownPostException extends BaseAdvException
{
    public function context(): array
    {
        $error = [
            'msg' => "Не найден пост"
        ];
        return $error;
    }
}

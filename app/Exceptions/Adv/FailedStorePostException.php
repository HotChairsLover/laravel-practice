<?php

namespace App\Exceptions\Adv;

class FailedStorePostException extends BaseAdvException
{
    public function context(): array
    {
        $error = [
            'msg' => "Ошибка сохранения поста"
        ];
        return $error;
    }
}

<?php

namespace App\Exceptions\Adv;

class FailedUpdatePostException extends BaseAdvException
{
    public function context(): array
    {
        $error = [
            'msg' => "Ошибка обновления поста"
        ];
        return $error;
    }
}

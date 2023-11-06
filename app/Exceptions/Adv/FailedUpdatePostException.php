<?php

namespace App\Exceptions\Adv;

class FailedUpdatePostException extends BaseAdvException
{
    public function context(): array
    {
        $error = [
            'message' => "Ошибка обновления поста",
        ];
        return $error;
    }
}

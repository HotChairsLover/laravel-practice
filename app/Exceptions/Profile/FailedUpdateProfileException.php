<?php

namespace App\Exceptions\Profile;

class FailedUpdateProfileException extends BaseProfileException
{
    public function context(): array
    {
        $error = [
            'msg' => "Ошибка обновления профиля"
        ];
        return $error;
    }
}

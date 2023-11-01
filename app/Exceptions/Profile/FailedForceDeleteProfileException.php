<?php

namespace App\Exceptions\Profile;

class FailedForceDeleteProfileException extends BaseProfileException
{
    public function context(): array
    {
        $error = [
            'msg' => "Ошибка удаления профиля"
        ];
        return $error;
    }
}

<?php

namespace App\Exceptions\Adv;

class FailedStoreCategoryException extends BaseAdvException
{
    public function context(): array
    {
        $error = [
            'message' => "Ошибка сохранения категории",
        ];
        return $error;
    }
}

<?php

namespace App\Exceptions\Adv;

class FailedStoreCategoryException extends BaseAdvException
{
    public function context(): array
    {
        $error = [
            'msg' => "Ошибка сохранения категории",
        ];
        return $error;
    }
}

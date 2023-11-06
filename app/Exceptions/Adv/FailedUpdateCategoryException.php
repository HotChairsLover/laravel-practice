<?php

namespace App\Exceptions\Adv;

class FailedUpdateCategoryException extends BaseAdvException
{
    public function context(): array
    {
        $error = [
            'message' => "Ошибка обноления категории",
        ];
        return $error;
    }
}

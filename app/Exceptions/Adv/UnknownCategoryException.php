<?php

namespace App\Exceptions\Adv;

class UnknownCategoryException extends BaseAdvException
{
    public function context(): array
    {
        $error = [
            'message' => "Не найдена категория",
        ];
        return $error;
    }
}

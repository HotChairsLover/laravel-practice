<?php

namespace App\Exceptions\Adv;

class FailedUpdateCategoryException extends BaseAdvException
{
    public function context(): array
    {
        $error = [
            'msg' => "Ошибка обновления категории"
        ];
        return $error;
    }
}

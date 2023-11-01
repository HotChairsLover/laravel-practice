<?php

namespace App\Repositories;

use App\Exceptions\UnknownApiKeyException;
use App\Models\User as Model;

/**
 * Class AdvCategoryRepository
 *
 * @package App\Repositories
 */
class ProfileRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Получить пользователя по apiKey
     * @param string $apiKey
     *
     * @return Model
     */
    public function getByApiKey(string $apiKey)
    {
        $user = $this->startConditions()->select()->where('api_key', '=', "$apiKey")->first();
        throw_if(!$user, UnknownApiKeyException::class);
        return $user;
    }

}

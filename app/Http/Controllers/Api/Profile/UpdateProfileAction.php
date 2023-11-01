<?php

namespace App\Http\Controllers\Api\Profile;

use App\Exceptions\Profile\FailedUpdateProfileException;
use App\Models\User;

class UpdateProfileAction
{
    public function __invoke(array $payload, User $user): User
    {
        throw_if(!$user->update($payload), FailedUpdateProfileException::class);

        return $user;
    }
}

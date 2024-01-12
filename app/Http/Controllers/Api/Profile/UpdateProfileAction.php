<?php

namespace App\Http\Controllers\Api\Profile;

use App\Exceptions\Profile\FailedUpdateProfileException;
use App\Models\User;

class UpdateProfileAction
{
    public function __invoke(array $payload, User $user): User
    {
        $user->fill($payload);
        if ($user->isDirty('email')) {
            $validator = validator($payload, ['email' => 'unique:users']);
            $validator->validate();
            throw_if(!$user->save(), FailedUpdateProfileException::class);
        } else {
            throw_if(!$user->save(), FailedUpdateProfileException::class);
        }


        return $user;
    }
}

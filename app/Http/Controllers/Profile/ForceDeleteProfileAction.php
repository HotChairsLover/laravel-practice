<?php

namespace App\Http\Controllers\Profile;

use App\Exceptions\Profile\FailedForceDeleteProfileException;
use App\Models\User;

class ForceDeleteProfileAction
{
    public function __invoke(User $user)
    {
        throw_if(!$user->forceDelete(), FailedForceDeleteProfileException::class);

        return $user;
    }
}

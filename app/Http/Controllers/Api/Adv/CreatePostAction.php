<?php

namespace App\Http\Controllers\Api\Adv;

use App\Exceptions\Adv\FailedStorePostException;
use App\Http\Factories\Adv\AdvPostFactory;
use App\Models\AdvPost;

class CreatePostAction
{
    public function __invoke(array $payload, $userId) : AdvPost
    {
        $post = AdvPostFactory::create($payload, $userId);

        throw_if(!$post->save(), FailedStorePostException::class);

        return $post;
    }
}

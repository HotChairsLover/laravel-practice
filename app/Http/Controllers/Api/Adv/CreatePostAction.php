<?php

namespace App\Http\Controllers\Api\Adv;

use App\Exceptions\Adv\FailedStorePostException;
use App\Http\Factories\Adv\AdvPostFactory;
use App\Models\AdvPost;

class CreatePostAction
{
    public function __invoke(array $payload) : AdvPost
    {
        $post = AdvPostFactory::create($payload);

        throw_if(!$post->save(), FailedStorePostException::class);

        return $post;
    }
}

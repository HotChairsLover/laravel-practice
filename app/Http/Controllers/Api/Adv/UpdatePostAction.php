<?php

namespace App\Http\Controllers\Api\Adv;

use App\Exceptions\Adv\FailedUpdatePostException;
use App\Exceptions\Adv\UnknownPostException;
use App\Http\Factories\Adv\AdvPostFactory;
use App\Models\AdvPost;
use App\Repositories\AdvPostRepository;

class UpdatePostAction
{
    public function __invoke(array $payload, string $id, AdvPostRepository $advPostRepository, $userId): AdvPost
    {
        $post = $advPostRepository->getEdit($id);

        throw_if(empty($post), UnknownPostException::class);

        $post = AdvPostFactory::update($post, $payload, $userId);

        throw_if(!$post->save(), FailedUpdatePostException::class);

        return $post;
    }
}

<?php

namespace App\Http\Controllers\Api\Adv;

use App\Exceptions\Adv\FailedUpdateCategoryException;
use App\Exceptions\Adv\UnknownCategoryException;
use App\Http\Factories\Adv\AdvCategoryFactory;
use App\Models\AdvCategory;
use App\Repositories\AdvCategoryRepository;

class UpdateCategoryAction
{
    public function __invoke(array $payload, string $id): AdvCategory
    {
        $advCategoryRepository = new AdvCategoryRepository();
        $category = $advCategoryRepository->getEdit($id);

        throw_if(empty($category), UnknownCategoryException::class);

        $category = AdvCategoryFactory::update($category, $payload);

        throw_if(!$category->save(), FailedUpdateCategoryException::class);

        return $category;
    }
}

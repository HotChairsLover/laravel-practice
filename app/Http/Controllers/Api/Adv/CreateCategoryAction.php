<?php

namespace App\Http\Controllers\Api\Adv;

use App\Exceptions\Adv\FailedStoreCategoryException;
use App\Http\Factories\Adv\AdvCategoryFactory;
use App\Models\AdvCategory;

class CreateCategoryAction
{
    public function __invoke(array $payload): AdvCategory
    {
        $category = AdvCategoryFactory::create($payload);
        throw_if(!$category->save(), FailedStoreCategoryException::class);

        return $category;
    }
}

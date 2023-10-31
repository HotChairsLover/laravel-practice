<?php

namespace App\Http\Factories\Adv;

use App\Models\AdvCategory;
use Illuminate\Support\Str;

class AdvCategoryFactory
{
    public static function create($data)
    {
        $advCategory = new AdvCategory($data);

        AdvCategoryFactory::setSlug($advCategory);

        return $advCategory;
    }

    public static function update($category, $data)
    {
        $advCategory = $category;
        $advCategory->fill($data);

        AdvCategoryFactory::setSlug($advCategory);

        return $advCategory;
    }

    private static function setSlug(AdvCategory $advCategory)
    {
        if (empty($advCategory->slug)) {
            $advCategory->slug = Str::slug($advCategory->title);
        }
    }
}

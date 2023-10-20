<?php

namespace App\Http\Factories\Adv;

use App\Models\AdvCategory;
use Illuminate\Support\Str;

class AdvCategoryFactory
{
    public function create($data)
    {
        $advCategory = new AdvCategory($data);

        $this->setSlug($advCategory);

        $advCategory->save();

        return $advCategory;
    }

    public function update($category, $data)
    {
        $advCategory = $category;
        $advCategory->fill($data);

        $this->setSlug($advCategory);

        $advCategory->save();

        return $advCategory;
    }

    private function setSlug(AdvCategory $advCategory)
    {
        if (empty($advCategory->slug)) {
            $advCategory->slug = Str::slug($advCategory->title);
        }
    }
}

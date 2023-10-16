<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class AdvCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [];

        $cName = 'Без категории';
        $categories[] = [
          'title' => $cName,
          'slug' => Str::slug($cName),
          'parent_id' => 0,
        ];

        for($i = 2; $i <= 11; $i++)
        {
            $cName = 'Категория №'.$i;
            $parent_id = ($i > 4) ? rand(1, 4) : 1;

            $categories[] = [
                'title' => $cName,
                'slug' => Str::slug($cName),
                'parent_id' => $parent_id,
            ];
        }

        \DB::table('adv_categories')->insert($categories);
    }
}

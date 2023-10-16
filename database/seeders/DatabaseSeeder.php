<?php

namespace Database\Seeders;

use App\Models\AdvPost;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AdvCategoriesTableSeeder::class);
        AdvPost::factory()->count(100)->create();
    }
}

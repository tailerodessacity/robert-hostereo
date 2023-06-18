<?php

namespace Database\Seeders;

use App\Models\PostTranslation;
use Illuminate\Database\Seeder;

class PostTranslationSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        PostTranslation::factory()->count(10)->create();
    }
}

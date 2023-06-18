<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Language::factory()->count(3)->create();
    }
}

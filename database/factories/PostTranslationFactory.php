<?php

namespace Database\Factories;

use App\Models\Language;
use App\Models\Post;
use App\Models\PostTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostTranslationFactory extends Factory
{
    protected $model = PostTranslation::class;

    public function definition()
    {
        $post = Post::factory()->create();
        $language = Language::factory()->create();

        return [
            'post_id' => $post->id,
            'language_id' => $language->id,
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'content' => $this->faker->paragraphs(3, true),
        ];
    }
}







<?php

namespace Tests\Unit;

use App\Models\Language;
use App\Models\Post;
use App\Models\PostTranslation;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTranslationControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_post_translation()
    {
        $post = Post::factory()->create();
        $language = Language::factory()->create();

        $data = [
            'post_id' => $post->id,
            'language_id' => $language->id,
            'title' => 'Test Title',
            'content' => 'Test Content',
            'description' => 'Test Description',

        ];

        $response = $this->post('/post-translations', $data);

        $response->assertStatus(201);

        $this->assertDatabaseHas('post_translations', $data);
    }

    /** @test */
    public function it_can_update_a_post_translation()
    {
        $post = Post::factory()->create();
        $language = Language::factory()->create();

        $data = [
            'post_id' => $post->id,
            'language_id' => $language->id,
            'title' => 'Test Title',
            'content' => 'Test Content',
            'description' => 'Test Description',
        ];

        $postTranslation = PostTranslation::factory()->create();

        $response = $this->put('/post-translations/' . $postTranslation->id, $data);

        $response->assertStatus(200);

        $this->assertDatabaseHas('post_translations', $data);
    }

    /** @test */
    public function it_can_delete_a_post_translation()
    {
        $postTranslation = PostTranslation::factory()->create();

        $id = $postTranslation->id;

        $response = $this->delete('/post-translations/' . $id);

        $response->assertStatus(204);

        $this->assertSoftDeleted($postTranslation);
    }
}

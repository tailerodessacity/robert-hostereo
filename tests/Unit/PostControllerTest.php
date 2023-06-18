<?php

namespace Tests\Unit;

use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\RedirectResponse;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    private $postRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->postRepository = app(PostRepository::class);
    }

    /** @test */
    public function it_can_return_all_posts()
    {
        Post::factory()->create();

        $response = $this->get('/posts');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_create_a_post()
    {
        $post = Post::factory()->create();

        $data = [
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ];

        $response = $this->post('/posts', $data);

        $response->assertStatus(201);

        $this->assertDatabaseHas('posts', $data);
    }

    /** @test */
    public function it_can_edit_a_post()
    {
        $post = Post::factory()->create();

        $response = $this->get('/posts/' . $post->id . '/edit');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_update_a_post()
    {
        $post = Post::factory()->create();

        $data = [
            'id' => $post->id,
            'created_at' => now(),
            'updated_at' => now()
        ];

        $response = $this->put('/posts/' . $post->id, $data);

        $response->assertStatus(200);

        $this->assertDatabaseHas('posts', $data);
    }

    /** @test */
    public function it_can_delete_a_post()
    {
        $post = Post::factory()->create();

        $response = $this->delete('/posts/' . $post->id);

        $response->assertStatus(204);

        $this->assertSoftDeleted($post);
    }
}

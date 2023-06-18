<?php

namespace Tests\Unit;

use App\Models\Tag;
use App\Repositories\TagRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\RedirectResponse;
use Tests\TestCase;

class TagControllerTest extends TestCase
{
    use RefreshDatabase;

    private $tagRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->tagRepository = app(TagRepository::class);
    }

    /** @test */
    public function it_can_return_all_tags()
    {
        Tag::factory()->count(3)->create();

        $response = $this->get('/tags');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_create_a_tags()
    {
        $data = [
            'name' => 'test tag name'
        ];

        $response = $this->post('/tags', $data);

        $response->assertStatus(201);

        $this->assertDatabaseHas('tags', $data);
    }

    /** @test */
    public function it_can_edit_a_tags()
    {
        $post = Tag::factory()->create();

        $response = $this->get('/tags/' . $post->id . '/edit');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_update_a_post()
    {
        $tag = Tag::factory()->create();

        $data = [
            'name' => 'test tag name'
        ];

        $response = $this->put('/tags/' . $tag->id, $data);

        $response->assertStatus(200);

        $this->assertDatabaseHas('tags', $data);
    }

    /** @test */
    public function it_can_delete_a_post()
    {
        $tag = Tag::factory()->create();

        $response = $this->delete('/tags/' . $tag->id);

        $response->assertStatus(204);

        $this->assertSoftDeleted($tag);
    }

}



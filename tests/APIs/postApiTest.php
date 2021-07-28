<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\post;

class postApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_post()
    {
        $post = post::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/posts', $post
        );

        $this->assertApiResponse($post);
    }

    /**
     * @test
     */
    public function test_read_post()
    {
        $post = post::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/posts/'.$post->id
        );

        $this->assertApiResponse($post->toArray());
    }

    /**
     * @test
     */
    public function test_update_post()
    {
        $post = post::factory()->create();
        $editedpost = post::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/posts/'.$post->id,
            $editedpost
        );

        $this->assertApiResponse($editedpost);
    }

    /**
     * @test
     */
    public function test_delete_post()
    {
        $post = post::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/posts/'.$post->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/posts/'.$post->id
        );

        $this->response->assertStatus(404);
    }
}

<?php namespace Tests\Repositories;

use App\Models\post;
use App\Repositories\postRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class postRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var postRepository
     */
    protected $postRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->postRepo = \App::make(postRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_post()
    {
        $post = post::factory()->make()->toArray();

        $createdpost = $this->postRepo->create($post);

        $createdpost = $createdpost->toArray();
        $this->assertArrayHasKey('id', $createdpost);
        $this->assertNotNull($createdpost['id'], 'Created post must have id specified');
        $this->assertNotNull(post::find($createdpost['id']), 'post with given id must be in DB');
        $this->assertModelData($post, $createdpost);
    }

    /**
     * @test read
     */
    public function test_read_post()
    {
        $post = post::factory()->create();

        $dbpost = $this->postRepo->find($post->id);

        $dbpost = $dbpost->toArray();
        $this->assertModelData($post->toArray(), $dbpost);
    }

    /**
     * @test update
     */
    public function test_update_post()
    {
        $post = post::factory()->create();
        $fakepost = post::factory()->make()->toArray();

        $updatedpost = $this->postRepo->update($fakepost, $post->id);

        $this->assertModelData($fakepost, $updatedpost->toArray());
        $dbpost = $this->postRepo->find($post->id);
        $this->assertModelData($fakepost, $dbpost->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_post()
    {
        $post = post::factory()->create();

        $resp = $this->postRepo->delete($post->id);

        $this->assertTrue($resp);
        $this->assertNull(post::find($post->id), 'post should not exist in DB');
    }
}

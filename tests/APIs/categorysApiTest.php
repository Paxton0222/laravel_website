<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\categorys;

class categorysApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_categorys()
    {
        $categorys = categorys::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/categorys', $categorys
        );

        $this->assertApiResponse($categorys);
    }

    /**
     * @test
     */
    public function test_read_categorys()
    {
        $categorys = categorys::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/categorys/'.$categorys->id
        );

        $this->assertApiResponse($categorys->toArray());
    }

    /**
     * @test
     */
    public function test_update_categorys()
    {
        $categorys = categorys::factory()->create();
        $editedcategorys = categorys::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/categorys/'.$categorys->id,
            $editedcategorys
        );

        $this->assertApiResponse($editedcategorys);
    }

    /**
     * @test
     */
    public function test_delete_categorys()
    {
        $categorys = categorys::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/categorys/'.$categorys->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/categorys/'.$categorys->id
        );

        $this->response->assertStatus(404);
    }
}

<?php namespace Tests\Repositories;

use App\Models\categorys;
use App\Repositories\categorysRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class categorysRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var categorysRepository
     */
    protected $categorysRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->categorysRepo = \App::make(categorysRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_categorys()
    {
        $categorys = categorys::factory()->make()->toArray();

        $createdcategorys = $this->categorysRepo->create($categorys);

        $createdcategorys = $createdcategorys->toArray();
        $this->assertArrayHasKey('id', $createdcategorys);
        $this->assertNotNull($createdcategorys['id'], 'Created categorys must have id specified');
        $this->assertNotNull(categorys::find($createdcategorys['id']), 'categorys with given id must be in DB');
        $this->assertModelData($categorys, $createdcategorys);
    }

    /**
     * @test read
     */
    public function test_read_categorys()
    {
        $categorys = categorys::factory()->create();

        $dbcategorys = $this->categorysRepo->find($categorys->id);

        $dbcategorys = $dbcategorys->toArray();
        $this->assertModelData($categorys->toArray(), $dbcategorys);
    }

    /**
     * @test update
     */
    public function test_update_categorys()
    {
        $categorys = categorys::factory()->create();
        $fakecategorys = categorys::factory()->make()->toArray();

        $updatedcategorys = $this->categorysRepo->update($fakecategorys, $categorys->id);

        $this->assertModelData($fakecategorys, $updatedcategorys->toArray());
        $dbcategorys = $this->categorysRepo->find($categorys->id);
        $this->assertModelData($fakecategorys, $dbcategorys->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_categorys()
    {
        $categorys = categorys::factory()->create();

        $resp = $this->categorysRepo->delete($categorys->id);

        $this->assertTrue($resp);
        $this->assertNull(categorys::find($categorys->id), 'categorys should not exist in DB');
    }
}

<?php namespace Tests\Repositories;

use App\Models\MetaSeo;
use App\Repositories\MetaSeoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MetaSeoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MetaSeoRepository
     */
    protected $metaSeoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->metaSeoRepo = \App::make(MetaSeoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_meta_seo()
    {
        $metaSeo = factory(MetaSeo::class)->make()->toArray();

        $createdMetaSeo = $this->metaSeoRepo->create($metaSeo);

        $createdMetaSeo = $createdMetaSeo->toArray();
        $this->assertArrayHasKey('id', $createdMetaSeo);
        $this->assertNotNull($createdMetaSeo['id'], 'Created MetaSeo must have id specified');
        $this->assertNotNull(MetaSeo::find($createdMetaSeo['id']), 'MetaSeo with given id must be in DB');
        $this->assertModelData($metaSeo, $createdMetaSeo);
    }

    /**
     * @test read
     */
    public function test_read_meta_seo()
    {
        $metaSeo = factory(MetaSeo::class)->create();

        $dbMetaSeo = $this->metaSeoRepo->find($metaSeo->id);

        $dbMetaSeo = $dbMetaSeo->toArray();
        $this->assertModelData($metaSeo->toArray(), $dbMetaSeo);
    }

    /**
     * @test update
     */
    public function test_update_meta_seo()
    {
        $metaSeo = factory(MetaSeo::class)->create();
        $fakeMetaSeo = factory(MetaSeo::class)->make()->toArray();

        $updatedMetaSeo = $this->metaSeoRepo->update($fakeMetaSeo, $metaSeo->id);

        $this->assertModelData($fakeMetaSeo, $updatedMetaSeo->toArray());
        $dbMetaSeo = $this->metaSeoRepo->find($metaSeo->id);
        $this->assertModelData($fakeMetaSeo, $dbMetaSeo->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_meta_seo()
    {
        $metaSeo = factory(MetaSeo::class)->create();

        $resp = $this->metaSeoRepo->delete($metaSeo->id);

        $this->assertTrue($resp);
        $this->assertNull(MetaSeo::find($metaSeo->id), 'MetaSeo should not exist in DB');
    }
}

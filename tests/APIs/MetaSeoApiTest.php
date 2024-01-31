<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\MetaSeo;

class MetaSeoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_meta_seo()
    {
        $metaSeo = factory(MetaSeo::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/meta_seos', $metaSeo
        );

        $this->assertApiResponse($metaSeo);
    }

    /**
     * @test
     */
    public function test_read_meta_seo()
    {
        $metaSeo = factory(MetaSeo::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/meta_seos/'.$metaSeo->id
        );

        $this->assertApiResponse($metaSeo->toArray());
    }

    /**
     * @test
     */
    public function test_update_meta_seo()
    {
        $metaSeo = factory(MetaSeo::class)->create();
        $editedMetaSeo = factory(MetaSeo::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/meta_seos/'.$metaSeo->id,
            $editedMetaSeo
        );

        $this->assertApiResponse($editedMetaSeo);
    }

    /**
     * @test
     */
    public function test_delete_meta_seo()
    {
        $metaSeo = factory(MetaSeo::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/meta_seos/'.$metaSeo->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/meta_seos/'.$metaSeo->id
        );

        $this->response->assertStatus(404);
    }
}

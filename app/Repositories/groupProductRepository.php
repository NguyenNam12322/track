<?php

namespace App\Repositories;

use App\Models\groupProduct;
use App\Repositories\BaseRepository;

/**
 * Class groupProductRepository
 * @package App\Repositories
 * @version January 19, 2022, 2:19 am UTC
*/

class groupProductRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return groupProduct::class;
    }
}

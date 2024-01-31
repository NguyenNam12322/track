<?php

namespace App\Repositories;

use App\Models\products;
use App\Repositories\BaseRepository;

/**
 * Class productsRepository
 * @package App\Repositories
 * @version May 6, 2022, 10:56 am +07
*/

class productsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'price',
        'category',
        'content',
        'images',
        'quatity'
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
        return products::class;
    }
}

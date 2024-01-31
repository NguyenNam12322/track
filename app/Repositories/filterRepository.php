<?php

namespace App\Repositories;

use App\Models\filter;
use App\Repositories\BaseRepository;

/**
 * Class filterRepository
 * @package App\Repositories
 * @version February 12, 2022, 3:41 pm +07
*/

class filterRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'code',
        'group_product_id'
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
        return filter::class;
    }
}

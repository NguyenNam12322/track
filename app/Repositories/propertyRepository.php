<?php

namespace App\Repositories;

use App\Models\property;
use App\Repositories\BaseRepository;

/**
 * Class propertyRepository
 * @package App\Repositories
 * @version February 14, 2022, 11:02 am +07
*/

class propertyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'filterId'
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
        return property::class;
    }
}

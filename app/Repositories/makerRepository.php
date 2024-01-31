<?php

namespace App\Repositories;

use App\Models\maker;
use App\Repositories\BaseRepository;

/**
 * Class makerRepository
 * @package App\Repositories
 * @version January 19, 2022, 2:47 am UTC
*/

class makerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'maker'
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
        return maker::class;
    }
}

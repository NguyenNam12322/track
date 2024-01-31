<?php

namespace App\Repositories;

use App\Models\gift;
use App\Repositories\BaseRepository;

/**
 * Class giftRepository
 * @package App\Repositories
 * @version March 20, 2022, 8:25 pm +07
*/

class giftRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
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
        return gift::class;
    }
}

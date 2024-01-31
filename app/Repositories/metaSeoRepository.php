<?php

namespace App\Repositories;

use App\Models\metaSeo;
use App\Repositories\BaseRepository;

/**
 * Class metaSeoRepository
 * @package App\Repositories
 * @version November 20, 2021, 9:50 am UTC
*/

class metaSeoRepository extends BaseRepository
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
        return metaSeo::class;
    }
}

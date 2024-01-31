<?php

namespace App\Repositories;

use App\Models\bannerHome;
use App\Repositories\BaseRepository;

/**
 * Class bannerHomeRepository
 * @package App\Repositories
 * @version December 1, 2021, 6:29 am UTC
*/

class bannerHomeRepository extends BaseRepository
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
        return bannerHome::class;
    }
}

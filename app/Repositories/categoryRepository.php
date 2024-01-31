<?php

namespace App\Repositories;

use App\Models\category;
use App\Repositories\BaseRepository;

/**
 * Class categoryRepository
 * @package App\Repositories
 * @version December 2, 2021, 8:51 am UTC
*/

class categoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'namecategory'
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
        return category::class;
    }
}

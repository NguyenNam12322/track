<?php

namespace App\Repositories;

use App\Models\image;
use App\Repositories\BaseRepository;

/**
 * Class imageRepository
 * @package App\Repositories
 * @version January 21, 2022, 7:54 am UTC
*/

class imageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'image',
        'link',
        'product_id'
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
        return image::class;
    }
}

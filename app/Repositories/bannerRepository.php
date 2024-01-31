<?php

namespace App\Repositories;

use App\Models\banner;
use App\Repositories\BaseRepository;

/**
 * Class bannerRepository
 * @package App\Repositories
 * @version February 17, 2022, 3:31 pm +07
*/

class bannerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'image',
        'title',
        'link'
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
        return banner::class;
    }
}

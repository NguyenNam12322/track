<?php

namespace App\Repositories;

use App\Models\banners;
use App\Repositories\BaseRepository;

/**
 * Class bannersRepository
 * @package App\Repositories
 * @version December 1, 2021, 6:44 am UTC
*/

class bannersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'image_banner'
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
        return banners::class;
    }
}

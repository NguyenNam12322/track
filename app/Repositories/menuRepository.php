<?php

namespace App\Repositories;

use App\Models\menu;
use App\Repositories\BaseRepository;

/**
 * Class menuRepository
 * @package App\Repositories
 * @version November 22, 2021, 3:16 am UTC
*/

class menuRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'menu_name',
        'menu_link'
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
        return menu::class;
    }
}

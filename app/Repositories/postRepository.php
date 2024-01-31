<?php

namespace App\Repositories;

use App\Models\post;
use App\Repositories\BaseRepository;

/**
 * Class postRepository
 * @package App\Repositories
 * @version November 29, 2021, 1:14 pm UTC
*/

class postRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'image',
        'title',
        'content'
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
        return post::class;
    }
}

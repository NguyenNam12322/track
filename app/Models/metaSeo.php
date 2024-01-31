<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class metaSeo
 * @package App\Models
 * @version November 20, 2021, 9:50 am UTC
 *
 * @property string $meta_title
 * @property string $meta_content
 * @property string $meta_og_title
 * @property string $meta_og_content
 */
class metaSeo extends Model
{

    public $table = 'meta_seos';
    

    public $fillable = [
        'meta_title',
        'meta_content',
        'meta_og_title',
        'meta_og_content',
        'meta_keywords'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'meta_title' => 'string',
        'meta_content' => 'string',
        'meta_og_title' => 'string',
        'meta_og_content' => 'string',
        'meta_keywords' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}

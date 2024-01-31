<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class image
 * @package App\Models
 * @version January 21, 2022, 7:54 am UTC
 *
 * @property string $image
 * @property string $link
 * @property string $product_id
 */
class image extends Model
{

    public $table = 'images';
    



    public $fillable = [
        'image',
        'link',
        'product_id',
        'order'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'image' => 'string',
        'link' => 'string',
        'product_id' => 'string',
        'order' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}

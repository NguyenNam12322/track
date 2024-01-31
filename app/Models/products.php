<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class products
 * @package App\Models
 * @version May 6, 2022, 10:56 am +07
 *
 * @property string $name
 * @property string $price
 * @property integer $category
 * @property string $content
 * @property string $images
 * @property string $quatity
 */
class products extends Model
{

    public $table = 'products';
    



    public $fillable = [
        'name',
        'price',
        'category',
        'content',
        'images',
        'quatity',
        'link',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'price' => 'string',
        'category' => 'integer',
        'images' => 'string',
        'quatity' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    
}

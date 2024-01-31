<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class banner
 * @package App\Models
 * @version February 17, 2022, 3:31 pm +07
 *
 * @property string $image
 * @property string $title
 * @property string $link
 */
class banner extends Model
{

    public $table = 'banners';
    



    public $fillable = [
        'image',
        'title',
        'link'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'image' => 'string',
        'link' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
       
        'image' => 'required|max:10000|mimes:jpg,jpeg, png',
        'title' => 'required',
        'link' => 'required',
    ];
    
    public static $rulesUpdate = [
       
        'image' => 'max:10000|mimes:jpg,jpeg, png',
        'title' => 'required',
        'link' => 'required',
    ];

    
}

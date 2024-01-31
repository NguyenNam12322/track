<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class gift
 * @package App\Models
 * @version March 20, 2022, 8:25 pm +07
 *
 * @property string $name
 * @property string $image
 */
class gift extends Model
{

    public $table = 'gifts';
    



    public $fillable = [
        'name',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'image' => 'required|max:10000|mimes:jpg,jpeg, png',
        'name' => 'required'
    ];

    public static $rule = [
        'image' => 'max:10000|mimes:jpg,jpeg, png',
        'name' => 'required'
    ];

    
}

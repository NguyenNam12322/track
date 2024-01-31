<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class property
 * @package App\Models
 * @version February 14, 2022, 11:02 am +07
 *
 * @property string $name
 * @property integer $filterId
 */
class property extends Model
{

    public $table = 'properties';
    



    public $fillable = [
        'name',
        'filterId'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'filterId' => 'integer'
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

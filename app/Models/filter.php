<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class filter
 * @package App\Models
 * @version February 12, 2022, 3:41 pm +07
 *
 * @property string $name
 * @property string $code
 * @property integer $group_product_id
 */
class filter extends Model
{

    public $table = 'filters';
    



    public $fillable = [
        'name',
        'code',
        'group_product_id',
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'code' => 'string',
        'group_product_id' => 'integer'
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

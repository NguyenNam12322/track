<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class groupProduct
 * @package App\Models
 * @version January 19, 2022, 2:19 am UTC
 *
 * @property string $name
 */
class groupProduct extends Model
{

    public $table = 'group_product';
    



    public $fillable = [
        'name', 'link', 'group_product_id','level', 'parent_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'link'=> 'string',
        'name'=> 'string',
        'group_product_id' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:1000'
    ];

    
}

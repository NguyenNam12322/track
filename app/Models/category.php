<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class category
 * @package App\Models
 * @version December 2, 2021, 8:51 am UTC
 *
 * @property string $namecategory
 * @property string $image
 */
class category extends Model
{

    public $table = 'categories';
    



    public $fillable = [
        'namecategory','link','image', 'parent_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'namecategory' => 'string',
        'image'=>'string',

        'parent_id'=>'string',

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'namecategory' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
    ];

    public static $rule = [
        'namecategory' => 'required',
       
    ];

    
}

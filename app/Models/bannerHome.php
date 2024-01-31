<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class bannerHome
 * @package App\Models
 * @version December 1, 2021, 6:29 am UTC
 *
 */
class bannerHome extends Model
{

    public $table = 'banner_homes';
    



    public $fillable = [
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'banner' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'banner' => 'required|max:10000|mimes:jpg,jpeg,png'
    ];

    
}

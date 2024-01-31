<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class menu
 * @package App\Models
 * @version November 22, 2021, 3:16 am UTC
 *
 * @property string $menu_name
 * @property string $menu_link
 */
class menu extends Model
{

    public $table = 'menus';
    



    public $fillable = [
        'menu_name',
        'menu_link'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'menu_name' => 'string',
        'menu_link' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'menu_name' => 'required',
        'menu_link' => 'required'
    ];

    
}

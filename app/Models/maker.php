<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class maker
 * @package App\Models
 * @version January 19, 2022, 2:47 am UTC
 *
 * @property string $maker
 */
class maker extends Model
{

    public $table = 'makers';
    



    public $fillable = [
        'maker'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'maker' => 'required|max:500'
    ];

    
}

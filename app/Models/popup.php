<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class popup extends Model
{
    public $table = 'popup';
    public $fillable = [
        'link',
        'option',
        'active',
        'image',
        
    ];
    public $timestamps = false;

}

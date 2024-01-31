<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class background extends Model
{
    public $table = 'background';

    public $timestamps = false;

    public $fillable = [
        'background_image',
        'background_color',
        
        
    ];
}

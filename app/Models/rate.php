<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rate extends Model
{
    public $table = 'rate';
    public $fillable = [
        'name',
        'email',
        'product_id',
        'star',
        'active',
        'content',
    ];    

    
}

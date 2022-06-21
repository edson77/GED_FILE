<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    protected $fillable = [
        'nom_direction', 'description', 'code_direction','parent'
    ];

    protected $table = 'direction';
}

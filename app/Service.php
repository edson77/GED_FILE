<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'nom_service', 'code_service', 'description', 'id_direction'
    ];
    protected $table = 'service';
}

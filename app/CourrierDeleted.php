<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourrierDeleted extends Model
{
    protected $fillable = [
        'id_original', 'id_suppresseur'
    ];

    protected $table = 'courrier_deleted';
}

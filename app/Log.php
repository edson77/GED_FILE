<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'libelle','auteur'
    ];

    protected $table = 'logs';
}

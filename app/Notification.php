<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'libelle','status','nature','element_id'
    ];

    protected $table = 'notifications';
}

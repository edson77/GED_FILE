<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audience extends Model
{
    protected $fillable = [
        'role', 'guest','phone','quality','objet'
    ];

    protected $table = 'audiences';
}

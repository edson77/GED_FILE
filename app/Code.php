<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    protected $table = 'secret';
    protected $fillable = [
        'secret','created_at','updated_at'
    ];
}

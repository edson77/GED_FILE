<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instruction extends Model
{
    protected $fillable = [
        'to','by','courrier','instruction'
    ];

    protected $table = 'instructions';
}

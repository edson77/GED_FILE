<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstructionAudience extends Model
{
    protected $fillable = [
        'audience', 'libelle','by'
    ];

    protected $table = 'instructions_audiences';
}

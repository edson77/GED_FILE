<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courrier extends Model
{
    protected $fillable = [
        'entreprise','emetteur','recepteur','type','numero','ordre','reception','sortie','direction','service','objet','contenu','fichier','deleted','mention','categorie','code','signataire','created_at', 'updated_at','id'
    ];

    protected $table = 'courrier';
}

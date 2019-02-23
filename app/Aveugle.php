<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aveugle extends Model
{
     protected $fillable = ['nom', 'prenom', 'region', 'ville', 'photo', 'telephone', 'tele_famille', 'log', 'lat','statut','auth'];

public function setNameAttribute($value)
{
    $this->attributes['nom'] = $value ?: null;
    $this->attributes['prenom'] = $value ?: null;
    $this->attributes['region'] = $value ?: null;
    $this->attributes['ville'] = $value ?: null;
    $this->attributes['photo'] = $value ?: null;
    $this->attributes['telephone'] = $value ?: null;
    $this->attributes['tele_famille'] = $value ?: null;
    $this->attributes['log'] = $value ?: null;
    $this->attributes['lat'] = $value ?: null;
     $this->attributes['statut'] = $value ?: null;
     $this->attributes['auth'] = $value ?: null;
}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
     protected $fillable = ['title', 'color', 'start', 'end' ];

public function setNameAttribute($value)
{
    $this->attributes['title'] = $value ?: null;
    $this->attributes['color'] = $value ?: null;
    $this->attributes['start'] = $value ?: null;
    $this->attributes['end'] = $value ?: null;
}
}

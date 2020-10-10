<?php

namespace App\Models\Tablas;

use Illuminate\Database\Eloquent\Model;


class girosas extends Model
{
    protected $fillable = ['name'];

    protected $table = 'girosas';

    Public function girosbs()
    {
        return $this->hasMany('App\Models\Tablas\girosbs','girosas_id');
    }

}

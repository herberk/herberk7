<?php

namespace App\models\varias;

use Illuminate\Database\Eloquent\Model;

class accesdir extends Model
{

    protected $table = 'accesdirs';

    protected $fillable = ['name','ruta','active'];

    protected $casts = [
        'active' => 'bool',
    ];
}

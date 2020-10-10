<?php

namespace App\models\empresas;

use Illuminate\Database\Eloquent\Model;

class empresa_jurada extends Model
{
    protected static $logAttributes = [ 'empresa_id', 'jurada_id','estado','anot'];
    protected static $logName = 'Empresas-Juradas';

    protected $fillable = [
        'empresa_id',
        'jurada_id',
        'arti_id',
        'estado',
        'folio',
        'anot'
    ];

}

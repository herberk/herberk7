<?php

namespace App\models\Tablas;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Comunas extends Model
{

    use LogsActivity;
    protected $table = 'Comunas';
    protected $fillable = ['name'];

    protected static $logAttributes = ['name'];
    protected static $logName = 'Tablas-Comunas';

    public function regiones() {
        return $this->belongsTo('App\models\Tablas\Regiones');
    }
}

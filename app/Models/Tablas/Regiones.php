<?php

namespace App\models\Tablas;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Regiones extends Model
{
    use LogsActivity;

    protected $table = 'Regiones';
    protected $fillable = ['name'];

    protected static $logAttributes = ['name'];
    protected static $logName = 'Tablas-Regiones';

  Public function comunas()
    {
        return $this->hasMany(Comunas,'regiones_id');

    }

}

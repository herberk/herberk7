<?php

namespace App\models\Tablas;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Ciudades extends Model
{
    use LogsActivity;

    protected $table = 'Ciudades';
    protected $fillable = ['name'];

    protected static $logAttributes = ['rut', 'name', 'email'];
    protected static $logName = 'Tablas-Ciudades';

}

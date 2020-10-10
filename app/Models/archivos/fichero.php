<?php

namespace App\models\archivos;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class fichero extends Model
{
    use LogsActivity;
    protected $table = 'ficheros';
    protected $guarded = [];

    protected static $logAttributes = ['name', 'empresa','directorio'];
    protected static $logName = 'Archivos-Ficheros';

    public function getSizeInKbAttribute()
    {
        return number_format($this->size / 1024, 1);
    }
}

<?php

namespace App\models\empresas;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class contacto extends Model
{
    use SoftDeletes;
    use LogsActivity;
    protected $table = 'contactos';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'rut',
        'name',
        'email',
        'fono',
        'notas',
        'empresas_id',
        'softDeletes'
    ];

    protected static $logAttributes = ['rut', 'name', 'email'];
    protected static $logName = 'Empresa-Contactos';

    public function empresas() {
        return $this->belongsTo('App\models\empresas\empresa');
    }
}

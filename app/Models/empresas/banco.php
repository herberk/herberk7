<?php

namespace App\models\empresas;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class banco extends Model
{
    use SoftDeletes;
    use LogsActivity;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'ctacte',
        'firman',
        'montoLin',
        'empresas_id',
        'softDeletes'
    ];
    protected static $logAttributes = ['name', 'ctacte', 'firman'];
    protected static $logName =  'Empresas-Banco';

    public function empresas()
    {
        return $this->belongsTo('App\models\empresas\empresa');
    }
}

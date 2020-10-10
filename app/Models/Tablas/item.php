<?php

namespace App\Models\Tablas;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class item extends Model
{
    use LogsActivity;

    protected $fillable = [
        'name',
        'codigo',
        'tipos_id'
    ];

    protected static $logAttributes = ['name'];
    protected static $logName = 'Tablas-Items';

    public function categorias() {
        return $this->belongsTo('App\models\Tablas\categoria');
    }
}

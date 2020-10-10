<?php

namespace App\Models\archivos;

use Illuminate\Database\Eloquent\Model;
use App\Models\empresas\empresa;
use Spatie\Activitylog\Traits\LogsActivity;


class directorio extends Model
{
    use LogsActivity;
    protected $fillable = [
        'ano',
        'name',
        'empresas_id',
        'categoriupload_id',
    ];

    protected static $logAttributes = ['name', 'ano','empresas_id'];
    protected static $logName = 'Archivos-Directorios';


    public function empresas() {
        return $this->belongsTo(empresa::class)->withDefault([
            'name_corto' => '(Sin empresa)'
        ]);
    }

    Public function ficheros()
     {
         return $this->hasMany(fichero::class);
     }

    public function getNombreAttribute()
    {
        return $this->ano . ' ' . $this->name;
    }
}

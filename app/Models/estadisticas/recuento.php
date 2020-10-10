<?php

namespace App\Models\estadisticas;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Models\Tablas\meses;
use App\Models\empresas\empresa;
use App\Models\Tablas\unidadvalor;

class recuento extends Model
{
    use SoftDeletes;
    use LogsActivity;

    protected $guarded = [];

    protected static $logAttributes = ['mes', 'ventaRCV', 'compraRCV','empresas_id'];
    /*Customizing the log name
    Specify $logName to make the model use another name than the default.*/
    protected static $logName = 'Estadisticas';
    /*By default the package will log the created, updated, deleted events.
    You can modify this behaviour by setting the $recordEvents property on a model.*/
    //  protected static $recordEvents = ['deleted'];
    /*If your model contains attributes whose change don’t need to trigger an activity being logged
    you can use $ignoreChangedAttributes*/

    public function meses() {
        return $this->belongsTo(meses::class)->withDefault([
           'mes' => '(Sin mes)'
        ]);
    }
    public function empresas() {
        return $this->belongsTo(empresa::class);
    }

    public function unidadvalors(){
        return $this->hasOne(unidadvalor::class, 'anopmes','anomes');
    }

}

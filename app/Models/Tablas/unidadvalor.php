<?php

namespace App\models\Tablas;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;


class unidadvalor extends Model
{
    use LogsActivity;
    protected $table = 'unidadvalores';
    protected $guarded = [];

    protected static $logAttributes = ['mes', 'utm', 'ipc','utma'];
    /*Customizing the log name
    Specify $logName to make the model use another name than the default.*/
    protected static $logName = 'Estadisticas';
    /*By default the package will log the created, updated, deleted events.
    You can modify this behaviour by setting the $recordEvents property on a model.*/
    //  protected static $recordEvents = ['deleted'];
    /*If your model contains attributes whose change don’t need to trigger an activity being logged
    you can use $ignoreChangedAttributes*/

    public function meses()
    {
        return $this->belongsTo(meses::class)->withDefault([
            'mes' => '(Sin mes)'
        ]);
    }


}

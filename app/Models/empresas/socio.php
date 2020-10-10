<?php

namespace App\models\empresas;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class socio extends Model
{
    use SoftDeletes;
    use LogsActivity;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'rut',
        'name',
        'fono',
        'email',
        'rep_legal',
        'porcen',
        'apopago',
        'apopend',
        'aporte',
        'notas',
        'softDeletes'
    ];

    protected static $logAttributes = ['rut', 'name', 'empresas_id'];

    /*Customizing the log name
    Specify $logName to make the model use another name than the default.*/
    protected static $logName = 'Empresas-Socios';

    /*By default the package will log the created, updated, deleted events.
    You can modify this behaviour by setting the $recordEvents property on a model.*/
    //  protected static $recordEvents = ['deleted'];
    /*If your model contains attributes whose change don’t need to trigger an activity being logged
    you can use $ignoreChangedAttributes*/


    public function empresas() {
        return $this->belongsTo(empresa::class)->withDefault([
            'name_corto' => '(Sin empresa)'
        ]);
    }

    public function getnotasAttribute($notas)
    {
        return $this->attributes['notas'] = strip_tags($notas,"");
    }

    public function sumacapital($id){

        return $this->where('empresas_id',($id))->sum('aporte');
    }

}

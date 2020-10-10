<?php

namespace App\models\empresas;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class jurada extends Model
{

    use LogsActivity;

    protected $fillable = [
        'nro_dj',
        'desc_corta',
        'fe_vence',
        'descripcion',
        'certificado',
        'fe_certifica',
        'Instruccion',
        'Formulario',
     ];

    protected static $logAttributes = ['nro_dj', 'desc_corta', 'fe_vence'];
    protected static $logName = 'Empresa-DJurada';

   public function setFevenceAttribute($value){
        $this->attributes['Fe_vence']=
           (new Carbon($value))->format('Y-m-d');
    }
     public function getFevenceAttribute($value) {
         $fe_vence = Carbon::parse($value);
         return $fe_vence->format('d-m-Y');
     }
     public function setFeCertificaAttribute($value):void  {
         $this->attributes['Fe_certifica']=
             (new Carbon($value))->format('Y-m-d');
     }
     public function getFeCertificaAttribute($value)  {
            $fe_certifica = Carbon::parse($value);
         return $fe_certifica->format('d-m-Y');
     }

    public function empresas()  {
        return $this->belongsToMany(empresa::class, 'empresa_juradas');
    }


}



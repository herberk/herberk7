<?php

namespace App\models\empresas;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class capital extends Model
{
    use LogsActivity, SoftDeletes;

    protected $fillable = [
        'ano',
        'empresas_id',
        'activo',
        'into21',
        'into1',
        'into2',
        'into3' ,
        'into5',
        'into6' ,
        'into7',
        'into8',
        'into9' ,
        'into22',
        'complementa1',
        'complementa2',
        'complementa3',
        'valfinanciero31',
        'valfinanciero1' ,
        'valfinanciero2 ',
        'valfinanciero3',
        'valfinanciero4',
        'valfinanciero5' ,
        'valfinanciero6' ,
        'valfinanciero7',
         'valfinanciero8',
         'valfinanciero9' ,
        'valtributario32',
         'valtributario1',
        'valtributario2' ,
        'valtributario3',
        'valtributario4',
        'valtributario5',
         'valtributario6',
         'valtributario7',
        'valtributario8',
        'pasivo51',
        'pasivoexigi1' ,
        'pasivoexigi2',
        'pasivoexigi3',
        'pasivoexigi4',
        'pasivoexigi5',
        'pasivoexigi6',
        'pasivoexigi7',
        'pasivoexigi8',
        'pasivoexigi9' ,
        'pasivoexigi10',
        'pasivoexigi11',
        'pasivoexigi12',
        'pasivoexigi13',
        'cmanual',
        'revaloriza',
        'capitaltri',
        'resultado',
        'impto',
        'cmimpto',
        'retiro',
        'cmretiro',
    ];

    protected static $logAttributes = [ 'ano','empresas_id','cmanual', 'capitaltri'];
    protected static $logName = 'Empresas-Capital Tributario';


    public function getActivoAttribute($value) {
         return number_format($value,0,'','');
    }

    public function getNotasAttribute($notas){
        If($this==empty($notas)){
            $notas = '';
        }
        return strip_tags($notas);
    }

}
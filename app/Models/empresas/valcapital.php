<?php

namespace App\models\empresas;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;


class valcapital extends Model
{
    use LogsActivity, softDeletes;
    protected $fillable = [
        'capitaltri',
        'ano',
        'pranual',
        'revaloriza',
        'resultado',
        'impto',
        'primpto',
        'revalimpto',
        'retiro',
        'capitalsgte',
        'capitals_id',
        'empresas_id',
    ];
    protected static $logAttributes = [ 'ano','empresas_id','resultado','capitalsgte'];
    protected static $logName = 'Empresas-Valida capital ';


    public function getActivoAttribute($value) {
        return number_format($value,0,'','');
    }
}

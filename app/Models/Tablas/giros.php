<?php

namespace App\Models\Tablas;

use Illuminate\Database\Eloquent\Model;

class giros extends Model
{
    protected $table = 'giros';
    protected $fillable = ['name','afecto','girosbs_id'];

    Public function girosbs()
    {
        return $this->belongsTo('App\Models\Tablas\girosbs');
    }


    Public static function filterAndPaginate($name,$type,$codigo)
    {
        return Giros::name($name)
            ->codigo($codigo)
            ->type($type)
            ->orderBy('id')
            ->paginate(15);
    }
    public function scopeName($query, $name)
    {
        if (trim($name) !="")
        {
            $query->where('name',"LIKE", "%$name%");
        }
    }
    public function scopeType($query, $type)
    {
        if (trim($type) != "")
        {
            $query->where('desgiros_id',$type);
        }
    }
    public function scopeCodigo($query, $codigo)
    {
        if (trim($codigo) !="")
        {
            $query->where('codigo',"LIKE", "%$codigo%");
        }
    }
    public static function findByNameOrCodigo($term) {
        return static::select('id','name','codigo')
            ->Where('name','LIKE',"%$term%")
            ->orwhere('codigo','LIKE',"%$term%")
            ->get();
    }
    public static function findByCodeOrName($term){
        return static::select('id','name','codigo')
            ->Where('codigo','LIKE',"$term%")
            ->orwhere('name','LIKE',"%$term%")
            ->get();
    }
}

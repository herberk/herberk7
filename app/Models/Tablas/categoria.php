<?php

namespace App\Models\Tablas;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;


class categoria extends Model
{
    use LogsActivity;

//    protected $table = 'tipos';
    protected $fillable = ['name'];

    protected static $logAttributes = ['name'];
    protected static $logName = 'Tablas-Tipos';

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}

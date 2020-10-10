<?php

namespace App\Models\auth;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Profession extends Model
{

    protected $fillable = ['title'];
    use LogsActivity;


    protected static $logAttributes = ['title'];
    protected static $logName = 'Usuarios-Profesion';

    public function profiles()
    {
        return $this->hasMany(UserProfile::class);
    }
}

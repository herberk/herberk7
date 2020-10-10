<?php

namespace App\Models\auth;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Skill extends Model
{
    use LogsActivity;

    protected static $logAttributes = ['name'];
    protected static $logName = 'Usuarios-Skills';
}

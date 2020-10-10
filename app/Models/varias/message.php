<?php

namespace App\models\varias;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\auth\User;
use Spatie\Activitylog\Traits\LogsActivity;

class message extends Model
{
    use SoftDeletes, LogsActivity;

    public $fillable = ['name','email','message','active', 'tipo','user_id'];

    protected static $logAttributes = ['name','email','user_id','tipo'];
    protected static $logName = 'varias-message';


    public function setStateAttribute($value)
    {
        $this->attributes['active'] = $value == 'active';
    }

    public function getStateAttribute()
    {
        if ($this->active !== null) {
            return $this->active ? 'active' : 'inactive';
        }
    }

   public function cuenta(){
    $count = message::where('active', 1)->count();
    return $count;
   }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

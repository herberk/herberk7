<?php

namespace App\Models\auth;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Activitylog\Traits\LogsActivity;
use QCod\ImageUp\HasImageUploads;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes, HasImageUploads ;
    use LogsActivity;

    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected static $logAttributes = ['name', 'nickname'];
    protected static $logName = 'Usuarios-Usuarios';

    protected $casts = [
        'active' => 'bool',
    ];

    protected static $imageFields = [
        'avatar' => [
            'placeholder' => 'https://api.adorable.io/avatars/160',
            'width' => 160,
            'height' => 160,
            'resize_image_quality' => 90,
            'crop' => true
        ]
    ];

    /**
     * Create a new Eloquent query builder for the model.
     *
     * @param  \Illuminate\Database\Query\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function newEloquentBuilder($query)
    {
        return new UserQuery($query);
    }

    public function team()
    {
        return $this->belongsTo(Team::class)->withDefault();
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'user_skill');
    }

    public function profile()
    {
        return $this->hasOne(UserProfile::class)->withDefault();
    }

    public function message()
    {
        return $this->hasMany(Message::class);
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function scopeFilterBy($query, QueryFilter $filters, array $data)
    {
        return $filters->applyTo($query, $data);
    }

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
    public function messages()
    {
        return $this->hasMany('App\Models\varias\Message');
    }
}

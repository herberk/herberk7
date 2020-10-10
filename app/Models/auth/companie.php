<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class companie extends Model
{
    use  SoftDeletes;

    protected $table = 'companies';

    protected $dates = ['deleted_at'];

    protected $fillable = ['domain', 'enabled'];
}

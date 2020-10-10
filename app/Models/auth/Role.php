<?php

namespace App\Models\auth;

class Role
{
    public static function getList()
    {
        return ['admin', 'user'];
    }
}

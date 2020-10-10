<?php

namespace App\Http\Controllers\User;

use App\Models\auth\Skill;
use App\Http\Controllers\Controller;

class SkillController extends Controller
{
    public function index()
    {
        return view('users.skills.index', [
            'skills' => Skill::orderBy('name')->get(),
        ]);
    }
}

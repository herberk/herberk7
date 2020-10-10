<?php

namespace App\Http\Controllers\User;
use App\Models\auth\{
    Profession, User, UserFilter, UserProfile};

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
  /*  public function edit()
    {
        $user = User::first(); //or auth()->user()

        return view('profile.edit', [
            'user' => $user,
            'professions' => Profession::orderBy('title')->get(),
        ]);
    }

    public function update(Request $request)
    {
        $user = User::first(); //or auth()->user()

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $user->profile->update([
            'bio' => $request->bio,
            'twitter' => $request->twitter,
            'profession_id' => $request->profession_id,
        ]);

        return back();
    }*/




}

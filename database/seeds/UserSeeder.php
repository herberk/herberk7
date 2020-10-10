<?php

use App\Models\auth\Skill;
use App\Models\auth\Team;
use App\Models\auth\User;
use App\Models\auth\Profession;
use App\Models\auth\UserProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    protected $professions;
    protected $skills;
    protected $teams;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->fetchRelations();

        $this->createAdmin();

        $this->createUsuario();

        foreach(range(1, 99) as $i) {
            $this->createRandomUser();
        }
    }

    protected function fetchRelations()
    {
        $this->professions = Profession::all();

        $this->skills = Skill::all();

        $this->teams = Team::all();
    }

    protected function createAdmin()
    {
        $admin = factory(User::class)->create([
            'team_id' => $this->teams->firstWhere('name', 'Styde'),
            'name' => 'Duilio Palacios',
            'email' => 'duilio@styde.net',
            'password' => bcrypt('laravel'),
            'role' => 'admin',
            'created_at' => now(),
            'active' => true,
        ]);

        $admin->skills()->attach($this->skills);

        $admin->profile->update([
            'bio' => 'Programador, profesor, editor, escritor, social media manager',
            'profession_id' => $this->professions->firstWhere('title', 'Desarrollador back-end')->id,
        ]);
    }

    protected function createUsuario()
    {
        $usuario = factory(User::class)->create([
            'team_id' => $this->teams->firstWhere('name', 'Herberk'),
            'name' => 'Hermann Berkhoff',
            'email' => 'hermann@berkhoff.cl',
            'password' => bcrypt('123456'),
            'role' => 'admin',
            'created_at' => now(),
            'active' => true,
        ]);

        $usuario->skills()->attach($this->skills);

        $usuario->profile->update([
            'bio' => 'Contador, agricultor, programador,  social media manager',
            'profession_id' => $this->professions->firstWhere('title', 'Desarrollador back-end')->id,
        ]);
    }


    protected function createRandomUser()
    {
        $user = factory(User::class)->create([
            'team_id' => rand(0, 2) ? null : $this->teams->random()->id,
            'active' => rand(0, 3) ? true : false,
            'created_at' => now()->subDays(rand(1, 90)),
        ]);

        $user->skills()->attach($this->skills->random(rand(0, 7)));

        $user->profile->update([
            'profession_id' => rand(0, 2) ? $this->professions->random()->id : null,
        ]);
    }
}

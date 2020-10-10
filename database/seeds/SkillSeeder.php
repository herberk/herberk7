<?php

use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\auth\Skill::class)->create(['name' => 'HTML']);
        factory(\App\Models\auth\Skill::class)->create(['name' => 'CSS']);
        factory(\App\Models\auth\Skill::class)->create(['name' => 'JS']);
        factory(\App\Models\auth\Skill::class)->create(['name' => 'PHP']);
        factory(\App\Models\auth\Skill::class)->create(['name' => 'SQL']);
        factory(\App\Models\auth\Skill::class)->create(['name' => 'OOP']);
        factory(\App\Models\auth\Skill::class)->create(['name' => 'TDD']);
    }
}

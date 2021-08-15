<?php

namespace Database\Seeders;

use App\Models\Discipline;
use App\Models\Group;
use App\Models\Score;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesPermissionsSeeder::class);

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@demo.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'created_at' => now(),
        ]);
        $user->assignRole('Admin');

        Group::factory(10)->create();
        Student::factory(50)->create();
        Discipline::factory(5)->create();
        Score::factory(100)->create();
    }
}

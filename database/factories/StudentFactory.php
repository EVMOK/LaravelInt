<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'user_id' => User::factory(),
            'group_id' => Group::factory(),
            'date_born' => date('Y-m-d'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

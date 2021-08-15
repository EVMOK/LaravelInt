<?php

namespace Database\Factories;

use App\Models\Discipline;
use App\Models\Group;
use App\Models\Score;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScoreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Score::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $studentsIds = Student::all()->pluck('id')->toArray();
        $disciplinesIds = Discipline::all()->pluck('id')->toArray();

        return [
            'student_id' => $studentsIds[array_rand($studentsIds)],
            'discipline_id' => $disciplinesIds[array_rand($disciplinesIds)],
            'value' => $this->faker->numberBetween(1, 5),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

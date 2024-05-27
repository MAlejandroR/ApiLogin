<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name"=>fake()->name("es_ES"),
            "email"=>fake()->safeEmail("es_ES"),
            "brith_date" => fake()->date("Y-m-d", '2000-01-01', '2010-12-31'), // Genera una fecha de nacimiento aleatoria entre 2000 y 2010
            "teachers_id"=>fake()->randomElement(Teacher::all())
        ];
    }
}

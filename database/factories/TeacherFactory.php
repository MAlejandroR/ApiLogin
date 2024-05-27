<?php

namespace Database\Factories;

use App\Enums\DepartmentEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->name("es_ES"),
            "email" => fake()->safeEmail(),
            "departament" =>fake()->randomElement(DepartmentEnum::values())
        ];
    }
}

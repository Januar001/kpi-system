<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nip' => $this->faker->unique()->numerify('NIP###'),  // Generates a unique NIP with 3 random digits
            'name' => $this->faker->name,  // Generates a random name
            'position' => $this->faker->randomElement(['Account Officer', 'Admin', 'IT']),  // Random position
            'department' => $this->faker->randomElement(['Finance', 'HR', 'IT', 'Marketing']),  // Random department (added a list)
            'email' => $this->faker->unique()->safeEmail,  // Generates a unique safe email
            'salary' => $this->faker->numberBetween(3000000, 10000000),  // Generates a random salary between 3 million to 10 million
            'hire_date' => $this->faker->dateTimeBetween('-5 years', 'now')->format('Y-m-d'), // Rentang antara 5 tahun lalu hingga sekarang
        ];
    }

    
}

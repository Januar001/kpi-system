<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Salary;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Salary>
 */
class SalaryFactory extends Factory
{

    protected $model = Salary::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
            $baseSalary = $this->faker->randomFloat(2, 2500000, 16000000);
            $bonus = $this->faker->randomFloat(2, 500000, 1000000);
            $totalSalary = $baseSalary + $bonus;

            // Mengambil tanggal random di 10 bulan terakhir dan mengatur ke awal bulan
            $salaryMonth = Carbon::now()->subMonths(rand(0, 9))->startOfMonth()->format('Y-m-d');

            return [
                'employee_id' => Employee::factory(),
                'base_salary' => $baseSalary,
                'bonus' => $bonus,
                'total_salary' => $totalSalary,
                'salary_month' => $salaryMonth,
            ];
    }
}

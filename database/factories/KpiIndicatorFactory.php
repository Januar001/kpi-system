<?php

namespace Database\Factories;

use App\Models\KpiIndicator;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KpiIndicator>
 */
class KpiIndicatorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = KpiIndicator::class;

    public function definition(): array
    {

        
        
        return [
            'kpi_category_id' => $this->faker->numberBetween(1, 10), // Sesuaikan dengan ID yang ada di tabel `kpi_categories`
            'name' => $this->faker->word,
            'weight' => $this->faker->numberBetween(1, 100),
            'description' => $this->faker->sentence,
        ];
    }
}

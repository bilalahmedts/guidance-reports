<?php

namespace Database\Factories;
use App\Models\GuidanceReport;

use Illuminate\Database\Eloquent\Factories\Factory;

class GuidanceReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = GuidanceReport::class;
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween($min = 2, $max = 21),
            'categories_id' => $this->faker->numberBetween($min = 1, $max = 3), 
            'transfer_per_day' => $this->faker->numberBetween($min = 1, $max = 500), 
            'call_per_day' => $this->faker->numberBetween($min = 1, $max = 500), 
            'rea_sign_up' => $this->faker->numberBetween($min = 1, $max = 500), 
            'tbd_assigned' => $this->faker->numberBetween($min = 1, $max = 500), 
            'no_of_matches' => $this->faker->numberBetween($min = 1, $max = 500), 
            'leads' => $this->faker->numberBetween($min = 1, $max = 500), 
            'conversations' => $this->faker->numberBetween($min = 1, $max = 500),
            'created_at' => $this->faker->date('Y-m-d')
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'company_id' => 1,
            'title' => $this->faker->name(),
            'summery' =>$this->faker->name(),
//            'pdf_details',
            'city_id' => 1,
            'type_id' => 1,
            'category_id' => 1,
            'currency_id' => 1,
            'per_id' => 1,
            'salary' =>$this->faker->randomNumber(),
            'expired_at' => $this->faker->date(),
            'job_post_email' => $this->faker->safeEmail(),
            'is_super_post' => rand(0,1),
            'applicants_count' => 10,
            'views_count' => 20,
            'created_at' => $this->faker->date(),
        ];
    }
}

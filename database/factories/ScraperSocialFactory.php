<?php

namespace Database\Factories;

use App\Models\Data;
use App\Models\ScraperSocial;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScraperSocialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ScraperSocial::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_id' => Data::factory()->create()->id,
            'company' => $this->faker->company,
            'url' => $this->faker->url,
            'social' => $this->faker->url,
        ];
    }
}

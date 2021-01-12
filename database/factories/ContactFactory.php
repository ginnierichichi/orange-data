<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\Data;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

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
            'phone' => $this->faker->phoneNumber,

        ];
    }
}

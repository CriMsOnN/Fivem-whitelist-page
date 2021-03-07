<?php

namespace Database\Factories;

use App\Models\Whitelists;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class WhitelistsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Whitelists::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->email,
            'fullname' => $this->faker->firstName ,
            'fivemHours' => '300',
            'steamName' => $this->faker->name,
            'story' => $this->faker->text(500),
            'status' => 'Pending',
        ];
    }
}

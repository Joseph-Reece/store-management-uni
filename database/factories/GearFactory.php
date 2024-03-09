<?php

namespace Database\Factories;

use App\Models\Gear;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class GearFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Gear::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name' => Str::random(4),
            'brand'=> $this->faker->string(5),
            'quantity'=> $this->faker->randomNumber(2),
            'price'=>  $this->faker->randomNumber(3),
            'category'=>'Indoor game',
            'sport'=>'football',
        ];
    }
}

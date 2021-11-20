<?php

namespace Database\Factories;

use App\Models\ModelStock;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModelStockFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ModelStock::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 6),
            'name' => $this->faker->name(),
            'image_url' =>
                'http://thumbnail.image.rakuten.co.jp/@0_mall/jetprice/cabinet/107/800364.jpg?_ex=128x128',
            'url' => $this->faker->url(),
            'number' => $this->faker->randomNumber(5),
            'expiry_date' => $this->faker->dateTime(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

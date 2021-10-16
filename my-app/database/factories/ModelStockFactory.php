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
            'id' => 1,
            'user_id' => 1,
            'name' => $this->faker->name(),
            'image_url' =>
                'http://thumbnail.image.rakuten.co.jp/@0_mall/jetprice/cabinet/107/800364.jpg?_ex=128x128',
            'url' => 'https://item.rakuten.co.jp/jetprice/x21203/',
            'number' => $this->faker->randomNumber(5),
            'expiry_date' => $this->faker->date(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

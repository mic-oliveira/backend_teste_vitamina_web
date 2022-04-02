<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class OpportunityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'status' => $this->faker->numberBetween(1,3),
            'customer_id' => Customer::factory(),
            'product_id' => Product::factory(),
            'seller_id' => Seller::factory(),
        ];
    }
}

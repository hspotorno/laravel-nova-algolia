<?php

namespace Database\Factories;

use App\Models\Ingredient;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IngredientProduct>
 */
class IngredientProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $product = Product::all()->random();
        return [
            'ingredient_id' => Ingredient::all()->random(),
            'product_id' => $product->id,
            'merchant_id' => $product->merchant_id,
        ];
    }
}

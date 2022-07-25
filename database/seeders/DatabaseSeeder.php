<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(1)->create();

         \App\Models\Merchant::factory()->create([
             'name' => 'Supermercado',
         ]);
        \App\Models\Merchant::factory()->create([
            'name' => 'Small Shop',
        ]);
        \App\Models\Merchant::factory()->create([
            'name' => 'Superstore',
        ]);

        $count = 50;
        \App\Models\Product::factory($count)->create();
        \App\Models\Ingredient::factory($count)->create();

        \App\Models\IngredientProduct::factory($count)->create();
    }
}

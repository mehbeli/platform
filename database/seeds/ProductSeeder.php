<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Eloquent::unguard();
        //disable foreign key check for this connection before running seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $faker = Faker::create();

        App\ProductDetail::truncate();
        App\Product::truncate();

        for ($i = 0; $i < 100; $i++) {
            $products = DB::table('products')->insert([
                'product_name' => $faker->sentence($nbWords = 6, $variableNbWords = true),
            ]);
        }

        $productList = App\Product::pluck('id')->toArray();

        for ($i = 0; $i < 100; $i++) {
            $productDetails = DB::table('product_details')->insert([
                'product_id' => $faker->randomElement($productList),
                'selling_price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 23),
                'product_cost' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 23),
                'weight' => $faker->randomDigit,
                'weight_unit' => 'kg',
                'SKU' => $faker->ean13,
                'active' => true,
                'descriptions' => $faker->paragraphs($nb = 3, $asText = true),
            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

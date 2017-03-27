<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            $customers = DB::table('customers')->insert([
                'name' => $faker->firstName.' '.$faker->lastName,
                'email_address' => $faker->email,
                'phone_number' => $faker->e164PhoneNumber
            ]);
        }
    }
}

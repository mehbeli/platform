<?php

use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'title' => 'currency',
            'slug' => str_slug('currency'),
            'value' => 'MYR',
        ]);
    }
}

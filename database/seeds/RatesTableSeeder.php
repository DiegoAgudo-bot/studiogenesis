<?php

use Illuminate\Database\Seeder;
use App\Rates;

class RatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rates::create(
                [
                    'price' => '9',
                    'start_date' => '2020-07-21',
                    'end_date' => '2020-07-24'
                ]
        );
    }
}

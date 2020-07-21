<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Product::create(
                [
                    'name' => 'Test1',
                    'description' => 'Test1',
                    'category' => '1'
                ]
        );
       
       Product::create(
                [
                    'name' => 'Test1',
                    'description' => 'Test1',
                    'category' => '1'
                ]
        );
       
       Product::create(
                [
                    'name' => 'test2',
                    'description' => 'test1',
                    'category' => '2'
                ]
        );
       
       Product::create(
                [
                    'name' => 'test2',
                    'description' => 'test1',
                    'category' => '2'
                ]
        );
       
       Product::create(
                [
                    'name' => 'test3',
                    'description' => 'test3',
                    'category' => '2'
                ]
        );
       
       Product::create(
                [
                    'name' => 'test3',
                    'description' => 'test3',
                    'category' => '2'
                ]
        );
    }
}

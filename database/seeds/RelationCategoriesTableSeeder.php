<?php

use Illuminate\Database\Seeder;
use App\Relation_categories;

class RelationCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Relation_categories::create(
                [
                    'product_id' => '9',
                    'category_id' => '2'
                ]
        );
    }
}

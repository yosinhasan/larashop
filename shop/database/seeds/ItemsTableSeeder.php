<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('items')->insert([
            [
                'name' => 'Cream',
                'price' => 10.5,
                'details' => 'Cream is a dairy product composed of the higher-butterfat layer skimmed from the top of milk before homogenization.',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Shampoo',
                'price' => 13.8,
                'details' => 'Shampoo is a hair care product, typically in the form of a viscous liquid, that is used for cleaning hair. ',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Soap',
                'price' => 3.6,
                'details' => 'Soap is a surfactant cleaning compound used for personal or other cleaning.',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Washing powder',
                'price' => 23,
                'details' => 'Washing powder is a type of detergent (cleaning agent) that is added for cleaning laundry, commonly mixtures of chemical compounds including alkylbenzenesulfonates, which are similar to soap but are less affected by hard water.',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
        ]);
    }

}

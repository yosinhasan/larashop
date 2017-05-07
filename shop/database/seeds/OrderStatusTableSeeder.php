<?php

use Illuminate\Database\Seeder;

class OrderStatusTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('order_status')->insert([
            [
                'name' => 'created',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'failed',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'paid',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
        ]);
    }

}

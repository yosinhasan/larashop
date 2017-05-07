<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('roles')->insert([
            [
                'name' => 'manager',
                'display_name' => 'manager',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
        ]);
        DB::table('role_user')->insert([
            [
                'user_id' => 1,
                'role_id' => 1,
            ],
        ]);
    }

}

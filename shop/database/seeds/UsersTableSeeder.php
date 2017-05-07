<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => '$2y$10$rExX7uvr0JILVvyfHYa3dedYDNm83UctlYMuvcHdWIbQmEEKvd6OG',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Jon Jones',
                'email' => 'user1@email.com',
                'password' => '$2y$10$rExX7uvr0JILVvyfHYa3dedYDNm83UctlYMuvcHdWIbQmEEKvd6OG',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Daniel Cormier',
                'email' => 'user2@email.com',
                'password' => '$2y$10$rExX7uvr0JILVvyfHYa3dedYDNm83UctlYMuvcHdWIbQmEEKvd6OG',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Khabib Nurmagomedov',
                'email' => 'user3@email.com',
                'password' => '$2y$10$rExX7uvr0JILVvyfHYa3dedYDNm83UctlYMuvcHdWIbQmEEKvd6OG',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Badr Hari',
                'email' => 'user4@email.com',
                'password' => '$2y$10$rExX7uvr0JILVvyfHYa3dedYDNm83UctlYMuvcHdWIbQmEEKvd6OG',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'Alistair Overeem',
                'email' => 'user5@email.com',
                'password' => '$2y$10$rExX7uvr0JILVvyfHYa3dedYDNm83UctlYMuvcHdWIbQmEEKvd6OG',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'George St Pierre',
                'email' => 'user6@email.com',
                'password' => '$2y$10$rExX7uvr0JILVvyfHYa3dedYDNm83UctlYMuvcHdWIbQmEEKvd6OG',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
        ]);
    }

}

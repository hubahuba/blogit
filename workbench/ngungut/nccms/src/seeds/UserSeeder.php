<?php

class UserSeeder extends Seeder {

    public function run()
    {
        DB::table('bi_users')->delete();

        DB::table('bi_users')->insert([
            0 => [
                'username' => 'menyemenye',
                'password' => Hash::make('h@3!'),
                'firstname' => 'Admin',
                'lastname' => 'Person',
                'nickname' => 'Admin Narrada',
                'level' => 1,
                'creator' => null
            ]
        ]);
    }

}
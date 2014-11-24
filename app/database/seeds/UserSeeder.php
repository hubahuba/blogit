<?php

class UserSeeder extends Seeder {

    public function run()
    {
        DB::table('bi_users')->delete();

        User::create([
            'username' => 'menyemenye',
            'password' => Hash::make('h@3!'),
            'firstname' => 'Admin',
            'lastname' => 'Person',
            'nickname' => 'Admin Narrada',
            'level' => 1,
            'creator' => null
        ]);
    }

}
<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        // Kommentera denna för att inte radera all data i tabellen
        DB::table('users')->delete();

        $users = array(
            [
                'name' => 'super_admin',
                'email' => 'superadmin@mail.com',
                'password' => '$2y$10$QhX7dCZ/4k2uOgFsa/mFNuuIHuPpKCU5J6tF3l5HFtaNOIpo4bCma',
                'super_user' => 1 ,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'name' => 'admin',
                'email' => 'admin@mail.com',
                'password' => '$2y$10$QhX7dCZ/4k2uOgFsa/mFNuuIHuPpKCU5J6tF3l5HFtaNOIpo4bCma',
                'super_user' => false ,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,            ],
        );

        DB::table('users')->insert($users);
    }
}
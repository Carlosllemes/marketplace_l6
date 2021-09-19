<?php

use Illuminate\Database\Seeder;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('users')->insert([
//            'name' => 'Carlos',
//            'email' => 'a@a.com',
//            'email_verified_at' => now(),
//            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
//            'remember_token' => 'aaaa',
//        ]);

        factory(App\User::class, 40)->create()->each(function ($user){
            $user->store()->save(factory(\App\Store::class)->make());
        });
    }
}

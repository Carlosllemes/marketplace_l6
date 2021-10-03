<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(StoreTableSeeder::class);
         $this->call(ProductTableSeeder::class);
         for ($i=0; $i<5; $i++){
         $this->call(ProductImageTableSeeder::class);
         }
         $this->call(CategoryTableSeeder::class);
    }
}

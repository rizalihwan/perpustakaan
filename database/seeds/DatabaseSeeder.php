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
        $this->call(UserSeeder::class);
        $this->call(ClassSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(AuthorBookSeeder::class);
        $this->call(CategoryBookSeeder::class);
        $this->call(PublisherBookSeeder::class);
    }
}

<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Rizal I. Sulaiman',
            'username' => 'admin',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Rizal Ganteng',
            'username' => 'siswa',
            'password' => bcrypt('password'),
            'role' => 'siswa'
        ]);
    }
}

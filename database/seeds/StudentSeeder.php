<?php

use App\Models\Student;
use Illuminate\Database\Seeder;
use\Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($a = 1; $a <= 5; $a++){
            Student::insert([
                'nisn' => random_int(1, 9). 18068 . random_int(1, 9),
                'first_name' => $faker->name,
                'last_name' => $faker->name,
                'gender' => random_int(0, 1),
                'classroom_id' => 1,
                'date_of_birth' => now()
            ]);
        }
    }
}

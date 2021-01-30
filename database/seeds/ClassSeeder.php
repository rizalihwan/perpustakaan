<?php

use App\Models\Classroom;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['RPLXII-1', 'RPLXII-2', 'BDPXII-1', 'BDPXII-2', 'TKJXII-1', 'TKJXII-2', 'MMDXII-1', 'MMDXII-2'];
        foreach($data as $classroom)
        {
            Classroom::create([
                'name' => $classroom
            ]);
        }
    }
}

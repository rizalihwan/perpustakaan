<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['Dongeng', 'Antologi', 'Ensiklopedi', 'Komik', 'Novel', 'Drama'];
        foreach($data as $category)
        {
            Category::create([
                'name' => $category
            ]);
        }
    }
}

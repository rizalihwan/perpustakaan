<?php

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['Rizal I. Sulaiman', 'Pidi Baiq', 'Onno W. Purbo'];
        foreach($data as $author)
        {
            Author::create([
                'name' => $author
            ]);
        }
    }
}

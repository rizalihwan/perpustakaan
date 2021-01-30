<?php

use App\Models\Publisher;
use Illuminate\Database\Seeder;

class PublisherBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['PT. RizalMentari', 'PT. RizalDigital', 'PT. IhwanSukses'];
        foreach($data as $publisher)
        {
            Publisher::create([
                'name' => $publisher
            ]);
        }
    }
}

<?php

use App\Ministry;
use Illuminate\Database\Seeder;

class ministrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ministry::create([
            'name' => 'Cee ministry',
            'description' => "The first ministry"
        ]);
    }
}

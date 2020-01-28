<?php

use Illuminate\Database\Seeder;
use App\BasicInformation;

class BasicInformationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //27

        BasicInformation::create([
            'description'   => 'FDP',
            'category_id'   => 27,
        ]);
    }
}

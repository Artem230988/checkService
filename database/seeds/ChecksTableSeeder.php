<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Str;


class ChecksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();


        for($i=0; $i<20; $i++)
        {
        	DB::table('checks')->insert([
		        'title' => $faker->sentence,
        		'description' => $faker->text(100),
        		'owner_id' => rand(1,10),
        		'created_at' => now(),
        	]);
    	}
    }
}

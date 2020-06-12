<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Str;

class StepsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i=0; $i<100; $i++)
        {
        	DB::table('steps')->insert([
		        'check_id' => rand(1,20),
        		'body' => $faker->sentence,
        		'completed' => rand(0,1),
        	]);
    	}
    }
}

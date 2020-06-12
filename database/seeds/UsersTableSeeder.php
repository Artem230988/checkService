<?php

use App\User;
//use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $namesSuperAdmin = ['SuperAdmin1', 'SuperAdmin2'];
        $namesAdmin = ['Admin1', 'Admin2', 'Admin3']; 
        $namesUser = ['User1', 'User2', 'User3', 'User4', 'User5'];
        $faker = \Faker\Factory::create();

        foreach($namesSuperAdmin as $name)
        {
        	DB::table('users')->insert([
		        'name' => $name,
		        'email' => $name.'@mail.ru',
		        'email_verified_at' => now(),
		        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
		        'remember_token' => Str::random(10),
		        'created_at' => now(),
		        'role_id' => 2,
        	]);
    	}

    	foreach($namesAdmin as $name)
        {
        	DB::table('users')->insert([
		        'name' => $name,
		        'email' => $name.'@mail.ru',
		        'email_verified_at' => now(),
		        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
		        'remember_token' => Str::random(10),
		        'created_at' => now(),
		        'role_id' => 3,
        	]);
    	}

    	        foreach($namesUser as $name)
        {
        	DB::table('users')->insert([
		        'name' => $name,
		        'email' => $name.'@mail.ru',
		        'email_verified_at' => now(),
		        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
		        'remember_token' => Str::random(10),
		        'created_at' => now(),
		        'role_id' => 1,
        	]);
    	}
    }
}

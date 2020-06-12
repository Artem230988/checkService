<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ['User' => 'Пользователь', 'SuperAdmin' => 'СуперАдмин', 'Admin' => 'Админ'];

        foreach($name as $key => $value)
        {
        	DB::table('roles')->insert([
            	'name' => $key,
            	'comment' => $value,
        ]);
    	}
    }
}

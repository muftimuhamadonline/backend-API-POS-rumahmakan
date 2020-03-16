<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
    	DB::table('users')->insert([
    		'name' => 'admin',
    		'email' => 'admin@gmail.com',
    		'password' => Hash::make('123123'),
    		'level' => 'admin',
    	]);
    	DB::table('users')->insert([
    		'name' => 'kasir',
    		'email' => 'kasir@gmail.com',
    		'password' => Hash::make('123123'),
    		'level' => 'kasir',
    	]);

    }
}

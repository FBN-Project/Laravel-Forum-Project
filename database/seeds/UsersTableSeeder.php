<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {




        $faker = Faker\Factory::create();
        foreach(range(1,15) as $inder)
        {

        
        	User::create([

        		'name' => $faker->name,
        		'email' => $faker->email,
        		'password' => Hash::make('password'),
        		'created_at' => $faker->dateTime,
        		'updated_at' => $faker->dateTime

        	]);
        }
    }
}

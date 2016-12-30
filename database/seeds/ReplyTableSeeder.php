<?php

use Illuminate\Database\Seeder;
use App\Reply;

class ReplyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        foreach(range(1,50) as $inder)
        {
        	Reply::create([

        		'user_id' => $faker->numberBetween(1,15),
        		'post_id' => $faker->numberBetween(1,15),
        		'body' => $faker->sentence(5),
        		'created_at' => $faker->dateTime,
        		'updated_at' => $faker->dateTime

        	]);
        }
    }
}

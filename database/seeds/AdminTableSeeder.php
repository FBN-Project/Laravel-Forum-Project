<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
           
                'name' => 'kyi',
                'email' => 'kyi@gmail.com',
                'password' => bcrypt('123456'),
                'admin' => 1

            ]);
    }
}

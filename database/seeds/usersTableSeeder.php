<?php

use Illuminate\Database\Seeder;
use App\User;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
        	'name'=>'Raphael',
        	'email'=>'r_sede@orange.fr',
        	'password' => bcrypt('azerty')
        ]);


        $faker = \Faker\Factory::create('fr-FR');
        $limit = 10;

        for ($i=0; $i<$limit; $i++) {
        	User::create([
        	'name'=>$faker->firstname,
        	'email'=>$faker->email,
        	'password' => bcrypt('azerty')
        	]);
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::truncate();

        $faker = \Faker\Factory::create('fr-FR');
        $limit = 50;

        for($i = 0; $i < $limit; $i ++) {
        	Article::create([
        		'articleTitle' => $faker->sentence,
        		'articleBody' => $faker->Text,
                'user_id' => $faker->numberBetween($min=1, $max = 11),
        		// 'user_id' => 1,
        	]);
        }
    }
}

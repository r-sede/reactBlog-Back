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
        		'author' => $faker->numberBetween($min=0, $max = 10),
        	]);
        }
    }
}

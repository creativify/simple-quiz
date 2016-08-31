<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Films', 'Sports', 'Music', 'Science'];
        $descriptions = ['Movie Related Quizzes', 'Sports Related Quizzes', 'Music Related Quizzes', 'Science Related
         Quizzes'];

        array_map(function($name, $description){
            DB::table('categories')->insert([
                'name' => $name,
                'description' => $description,
            ]);
        }, $names, $descriptions);
    }
}

<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class QuizzesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Movies R Us', 'Sporting Greats', 'Band Members', 'Famous Scientists'];
        $descriptions = ['Know your movie trivia? Prove it!', 'Do you know these sporting legends?', 'Name the member
         of these famous bands', 'Name these pioneers of science'];
        $categories = [1, 2, 3, 4];

        array_map(function($name, $description, $category){
            DB::table('quizzes')->insert([
                'name' => $name,
                'description' => $description,
                'category_id' => $category,
                'active' => true,
            ]);
        }, $names, $descriptions, $categories);
    }
}

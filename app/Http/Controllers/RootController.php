<?php

namespace App\Http\Controllers;

use App\Category;
use App\Quiz;
use Illuminate\Http\Request;

use App\Http\Requests;

class RootController extends Controller
{
    public function index() {
        $categories = Category::all();
        $quizzes = Quiz::all();
        return view('welcome', ['categories' => $categories, 'quizzes' => $quizzes]);
    }

}

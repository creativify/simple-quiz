<?php

namespace App\Http\Controllers;

use App\Category;
use App\Quiz;
use Illuminate\Http\Request;

use App\Http\Requests;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        $quizzes = Quiz::where('active', true)->get();
        return view('category.index', ['categories' => $categories, 'quizzes' => $quizzes]);
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::all();
        $quizzes = Quiz::where('active', true)->get();
        return view('category.show', ['categories' => $categories, 'quizzes' => $quizzes, 'category' => $category]);
    }
}

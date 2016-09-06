<?php

namespace App\Http\Controllers;

use App\Category;
use App\Quiz;
use Illuminate\Http\Request;

use App\Http\Requests;

class CategoryController extends Controller
{

    protected $categories, $quizzes;
    /**
     * CategoryController constructor.
     */
    public function __construct()
    {
        $this->categories = Category::all();
        $this->quizzes = Quiz::where('active', true)->get();
    }

    public function index()
    {
        return view('category.index', ['categories' => $this->categories, 'quizzes' => $this->quizzes]);
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('category.show', ['categories' => $this->categories, 'quizzes' => $this->quizzes, 'category' =>
            $category]);
    }
}

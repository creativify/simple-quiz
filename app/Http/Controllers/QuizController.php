<?php

namespace App\Http\Controllers;

use App\Category;
use App\Quiz;

class QuizController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $quizzes = Quiz::where('active', true)->get();
        return view('quiz.index', ['quizzes' => $quizzes, 'categories' => $categories]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::all();
        $quizzes = Quiz::where('active', true)->get();
        $quiz = Quiz::findOrFail($id);
        return view('quiz.show', ['quizzes' => $quizzes, 'categories' => $categories, 'quiz' => $quiz]);
    }
}

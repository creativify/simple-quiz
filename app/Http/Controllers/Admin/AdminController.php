<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Quiz;
use App\Category;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    protected $quizzes, $users, $categories, $allData;
    /**
     * AdminController constructor.
     */
    public function __construct()
    {
        $this->categories = Category::all();
        $this->quizzes = Quiz::all();
        $this->users = User::all();
        $this->allData = ['users' => $this->users, 'quizzes' => $this->quizzes, 'categories' => $this->categories];
        $this->middleware('auth');
        $this->middleware('auth.admin');

    }

    public function index()
    {
        return view('admin.index', $this->allData);
    }

    public function showQuizzes()
    {
        return view('admin.quizzes', $this->allData);
    }

    public function showUsers()
    {
        return view('admin.users', $this->allData);
    }
}

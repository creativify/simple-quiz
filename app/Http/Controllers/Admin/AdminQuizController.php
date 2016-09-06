<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Quiz;
use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class AdminQuizController
 * @package App\Http\Controllers\Admin
 */
class AdminQuizController extends Controller
{

    /**
     * AdminQuizController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Requests\StoreQuiz  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StoreQuiz $request)
    {
        $quiz = new Quiz();
        try{
            $quiz->name = $request->input('quizname');
            $quiz->description = $request->input('description');
            $quiz->active = $request->input('active');
            $quiz->category_id = $request->input('category');
            $quiz->save();

            return redirect()->route('adminquizzes')->with('statussuccess', 'Quiz has been created');
        }
        catch (\Exception $e) {
            return redirect()->route('adminquizzes')->with('statuserror', 'There was an error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quiz = Quiz::findOrFail($id);
        $categories = Category::all();
        return view('admin.quiz.show', ['quiz' => $quiz, 'categories'=> $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreQuiz  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\StoreQuiz $request, $id)
    {
        $quiz = Quiz::find($id);
        try{
            $quiz->name = $request->input('quizname');
            $quiz->description = $request->input('description');
            $quiz->active = $request->input('active');
            $quiz->category_id = $request->input('category');
            $quiz->save();

            return redirect()->route('quiz.show',[$quiz])->with('statussuccess', 'Quiz has been updated');
        }
        catch (\Exception $e) {
            return redirect()->route('quiz.show',[$quiz])->with('statuserror', 'There was an error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ( Quiz::find($id)->delete() ) {
            return response()->json(['success' => 'Quiz has been deleted successfully']);
        }
        else {
            return response()->json(['error' => 'Quiz has not been deleted.']);
        }
    }
}

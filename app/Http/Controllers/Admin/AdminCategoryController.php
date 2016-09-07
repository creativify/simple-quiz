<?php

namespace App\Http\Controllers\Admin;

use App\Category;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminCategoryController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  Requests\StoreCategory  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StoreCategory $request)
    {
        $category = new Category();
        try{
            $category->name = $request->input('categoryname');
            $category->description = $request->input('description');
            $category->save();

            return redirect()->route('admincategories')->with('statussuccess', 'Category has been created');
        }
        catch (\Exception $e) {
            return redirect()->route('admincategories')->with('statuserror', 'There was an error');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Requests\StoreCategory  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\StoreCategory $request, $id)
    {
        $category = Category::find($id);
        try{
            $category->name = $request->input('categoryname');
            $category->description = $request->input('description');
            $category->save();

            return redirect()->route('admincategories')->with('statussuccess', 'The category has been updated');
        }
        catch (\Exception $e) {
            return redirect()->route('admincategories')->with('statuserror', 'There was an error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ( Category::find($id)->delete() ) {
            return response()->json(['success' => 'Category has been deleted successfully']);
        }
        else {
            return response()->json(['error' => 'The Category has not been deleted.']);
        }
    }
}

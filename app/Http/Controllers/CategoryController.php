<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return response()->json(['response'=>'success','categories'=>$category]);
    }


    public function create()
    {
    }


    public function store(CategoryRequest $request)
    {
        $data = Category::create($request->all());
        return response()->json(['created'=>'category created successfuly','category'=>$data],201);
    }

  
    public function show($id)
    {
        if(!Category::find($id)){
            return response()->json(['response'=>'not found'],404);
        }
        // return response()->json(['response'=>'not found'],404);
        return Category::find($id);
    }

    public function edit(string $id)
    {
        //
    }

 
    public function update(Request $request, string $id)
    {
        $category_update = Category::find($id);
        $category_update->update($request->all());
        return $category_update;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Category::destroy($id);
    }
}

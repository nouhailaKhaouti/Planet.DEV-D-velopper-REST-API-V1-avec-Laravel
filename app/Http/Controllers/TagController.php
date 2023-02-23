<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tag = Tag::all();
        return response()->json(['response'=>'success','tags'=>$tag]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {
        $data = Tag::create($request->all());
        return response()->json(['created'=>'tag created successfuly','tag'=>$data],201);
    }

    /**
     * Display the specified resource.
     */

    public function show($id)
    {
        if(!tag::find($id)){
            return response()->json(['response'=>'not found'],404);
        }
        // return response()->json(['response'=>'not found'],404);
        return tag::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tag_update = Tag::find($id);
        $tag_update->update($request->all());
        return $tag_update;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Tag::destroy($id);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\article;
use App\Models\comment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class CommentController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = comment::all();
        return response()->json($comments);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $comment = new comment();
        $comment->user_id = $request->userid;
        $comment->article_id = $request->articleid;
        $comment->description =$request->description;
        $comment->save();
        
        return response()->json($comment);
    }

    /**
     * Display the specified resource.
     */
    public function show(article $article, comment $comment)
    {
        return response()->json($comment);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comment2update =comment::find($id);
        $comment2update->update($request->all());
        
        return response()->json($comment2update);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        comment::destroy($id);

        return response()->json([
            'status' => true,
            'message' => 'Comment deleted successfully'
        ], 200);
    }
}

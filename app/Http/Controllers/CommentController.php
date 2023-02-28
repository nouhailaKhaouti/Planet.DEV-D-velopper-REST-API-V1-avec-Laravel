<?php

namespace App\Http\Controllers;

use App\Models\article;
use App\Models\comment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class CommentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api',['except' => []]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(article $article)
    {
        $comments= Comment::where('article_id',$article->id )->get();
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
    public function store(article $article,Request $request)
    {
        $comment = new comment();
        $comment->user_id =auth()->user()->id;
        $comment->article_id = $article->id;
        $comment->description =$request->description;
        $comment->save();
        
        return response()->json($comment);
    }

    /**
     * Display the specified resource.
     */
    public function show()

    { 
        $comments= Comment::where('user_id',auth()->user()->id)->get();
        return response()->json($comments);
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
    public function update(article $article, comment $comment, Request $request)
    {
        // $comment2update =comment::find($id);
        // $comment2update->update($request->all());
        
        // return response()->json($comment2update);
        $comment->description = $request->description;
        $comment->update();
        
        return response()->json($comment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(article $article, comment $comment)
    {
        // comment::destroy($id);

        // return response()->json([
        //     'status' => true,
        //     'message' => 'Comment deleted successfully'
        // ], 200);

        $comment->delete();
        
        return response()->json([
            'status' => true,
            'message' => 'Comment deleted successfully'
        ], 200);
    }
}

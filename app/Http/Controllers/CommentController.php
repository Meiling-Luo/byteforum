<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all();

        return response()->json($comments, 200);
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
        $comment = new comment; //create a instance of our model.
        $comment->content = $request->input('content');
        $comment->save();
        return response()->json($comment, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $comment = Comment::find($id);

        return response()->json($comment, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $comment->content = $request->input('content');
        $comment->save();

        return response()->json($comment, 200);
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return response()->json($comment, 200);
    }
}

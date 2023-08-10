<?php

namespace App\Http\Controllers;

use App\Models\Upvote;
use Illuminate\Http\Request;

class UpvoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $upvotes = Upvote::all();

        return response()->json($upvotes, 200);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Upvote $upvote)
    {
        return response()->json($upvote, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Upvote $upvote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Upvote $upvote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Upvote $upvote)
    {
        //
    }
}

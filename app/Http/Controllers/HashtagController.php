<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Hashtag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HashtagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $tag)
    {
        
        $tagPosts = Post::whereHas('hashtags',function ($query)use($tag){
            $query->where('tag', $tag);
        })->with('hashtags')->get();
        //dd($tagPosts);

        $id = $tag;
       return view('hashtag.index')->with('tagPosts', $tagPosts)->with('tagName', $id);
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
        
    }

    /**
     * Display the specified resource.
     */
    public function filter(string $id)
    {
        $hashtages = Hashtag::where("tag", "like", $id . "%")->get();
        return response()->json([
            'hashtages' => $hashtages
        ]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // Store Comment 
    public function store(Request $request, $movie_id)
    {
        $formFields = $request->validate([
            'content' => 'required',
        ]);

        Comment::store($formFields, $movie_id);
        return back()->with('message','comment created!');
    }
    
}

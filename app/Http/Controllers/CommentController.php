<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;



class CommentController extends Controller
{

    
    public function index()
    {
        $comments = Comment::all();

        return view('resp.recipePage')->with('comments', $comments);
    }
    
    public function store(Request $request)
{
    $request->validate([
        'body' => 'required|max:255',
    ]);

    // Use the authenticated user to associate the comment
    Auth::user()->comments()->create($request->all());

    return back();
}

    
}



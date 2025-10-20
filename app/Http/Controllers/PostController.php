<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'postcontent' => 'required|string|max:280',
        ]);

        $user = auth()->user();

        Posts::create([
            'id_user' => $user->id_user,
            'postcontent' => $request->input('postcontent'),
            'date_posted' => now(),
        ]);

        // redirect or refresh via Inertia
        return redirect()->back();
    }
    public function index()
    {
        $posts = Posts::with('user')->latest('date_created')->get();

        return inertia('Dashboard', [
            'posts' => $posts,
        ]);
    }
}
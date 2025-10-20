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
        $userId = auth()->user()->id_user;

    $posts = Posts::with('user', 'likes')->latest('date_created')->get()->map(function ($post) use ($userId) {
        return [
            'id_post' => $post->id_post,
            'postcontent' => $post->postcontent,
            'date_created' => $post->date_created,
            'user' => $post->user,
            'likes_count' => $post->likes->count(),
            'liked_by_user' => $post->likes->contains('id_user', $userId),
        ];
    });
        return inertia('Dashboard', [
            'posts' => $posts,
        ]);
    }
}
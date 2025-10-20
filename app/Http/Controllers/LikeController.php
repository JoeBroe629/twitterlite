<?php
namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function toggle(Request $request, $id_post)
    {
        $userId = auth()->user()->id_user;

        $like = Like::where('id_user', $userId)
                    ->where('id_post', $id_post)
                    ->first();

        if ($like) {
            // If already liked → unlike it
            $like->delete();
            $status = 'unliked';
        } else {
            // Otherwise → like it
            Like::create([
                'id_user' => $userId,
                'id_post' => $id_post,
            ]);
            $status = 'liked';
        }

        return response()->json([
            'status' => $status,
            'likes_count' => Post::find($id_post)->likes()->count(),
        ]);
    }
}
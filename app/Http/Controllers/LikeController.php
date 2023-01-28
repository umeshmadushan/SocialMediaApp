<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function toggleLike(Post $post) {
        auth()->user()->toggleLike($post);

        return back();
    }
}

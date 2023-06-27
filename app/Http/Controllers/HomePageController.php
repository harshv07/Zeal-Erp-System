<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use App\Models\Post;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function notice()
    {
        $notices = Notice::with('user')
            ->with('year')
            ->with('branch')
            ->with('media')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('notice', compact('notices'));
    }
    public function post()
    {
        $posts = Post::with('user')
            ->with('media')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('post', compact('posts'));
    }

    public function help()
    {

        return view('help');
    }
}

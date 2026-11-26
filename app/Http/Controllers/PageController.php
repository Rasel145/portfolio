<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Project;

class PageController extends Controller
{
    public function home()
    {
        return view('home', [
            'projects' => Project::query()
                ->orderByDesc('featured')
                ->orderBy('sort_order')
                ->latest()
                ->take(6)
                ->get(),
            'posts' => Post::published()->latest('published_at')->take(3)->get(),
        ]);
    }

    public function projects()
    {
        return view('projects', [
            'projects' => Project::query()->orderBy('sort_order')->latest()->get(),
        ]);
    }

    public function blog()
    {
        return view('blog.index', [
            'posts' => Post::published()->latest('published_at')->paginate(6),
        ]);
    }

    public function post(Post $post)
    {
        abort_unless($post->isPublished(), 404);

        return view('blog.show', ['post' => $post]);
    }
}

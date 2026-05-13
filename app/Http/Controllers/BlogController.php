<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = []; //Post::where('is_published', true)->latest()->paginate(10);
        return view('blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->where('is_published', true)->firstOrFail();

        $converter = new GithubFlavoredMarkdownConverter();
        $post->body_html = $converter->convert($post->body);

        return view('blog.show', compact('post'));
    }
}

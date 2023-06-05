<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->paginate();
        return view('post.list', compact('posts'));
    }
    
    public function create(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->iscomplated = 0;
        $post->save();
        return redirect()->back();

    }

    public function edit($id, Request $request)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->update();
        return redirect()->back();
    }

    public function updateIsComplated($id)
    {
        $post = Post::find($id);
        $post->iscomplated = !($post->iscomplated);
        $post->update();
        return redirect()->back();
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back();
    }
}
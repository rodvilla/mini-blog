<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Actions\ClearPaginationCache;
use App\Http\Requests\CreatePostRequest;

class PostsController extends Controller
{
    /**
     * Display a list of posts created by the authenticated user
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        // Only display posts that belong to this user
        return view('posts.index', [
            'posts' => Post::byMostRecent()->where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Display a form to create a new post
     *
     * @return Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store the new blog post
     *
     * @return Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $data = $request->validated();

        $post = Post::make($data);
        $post->published_at = Carbon::now();
        
        auth()->user()->posts()->save($post);

        new ClearPaginationCache;

        return redirect()->route('posts.index')
            ->with('status', 'Post saved succesfully!');
    }
}

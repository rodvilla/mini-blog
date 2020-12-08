<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $page = request()->has('page') ? request()->get('page') : 1;

        // Cache only applies for a number of pages
        if ($page <= Post::$pagesToCache) {
            $posts = Cache::rememberForever("posts.page.$page", function () {
                return Post::byMostRecent()
                    ->paginate(Post::$itemsPerPage);
            });
        } else {
            $posts = Post::byMostRecent()
                ->paginate(Post::$itemsPerPage);
        }

        return view('home', compact('posts'));
    }
}

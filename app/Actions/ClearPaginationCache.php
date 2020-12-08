<?php

namespace App\Actions;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class ClearPaginationCache
{
    public function __construct()
    {
        for ($page = 0; $page <= Post::$pagesToCache; $page++) {
            Cache::forget("posts.page.$page");
        }
    }
}

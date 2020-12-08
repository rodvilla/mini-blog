<?php

namespace App\Jobs;

use App\Models\Post;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ImportPostsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;

    public $endpoint = "https://sq1-api-test.herokuapp.com/posts";

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $response = Http::get($this->endpoint);

        if (! $response->ok()) {
            return;
        }

        $response = json_decode($response, true);
        if (false === $response) {
            return;
        }

        // Assuming we used the command to add the admin user
        $admin = User::find(1);
        $posts = $response['data'];

        foreach ($posts as $post) {
            $post = Post::make([
                'title' => $post['title'],
                'description' => $post['description'],
                'published_at' => $post['publication_date']
            ]);
            $admin->posts()->save($post);
        }
    }
}

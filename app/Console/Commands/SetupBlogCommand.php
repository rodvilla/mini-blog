<?php

namespace App\Console\Commands;

use App\Actions\ClearPaginationCache;
use App\Models\Post;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SetupBlogCommand extends Command
{
    protected $signature = 'blog:setup {--email=admin@admin.com} {--password=password}';

    protected $description = 'Adds the admin user and a few blog posts';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        // Clean up
        DB::table('users')->truncate();
        DB::table('posts')->truncate();

        // Add the admin user
        $user = User::create([
            'name' => 'Admin',
            'email' => $this->option('email'),
            'password' => Hash::make($this->option('password')),
        ]);

        // Create 3 blog posts for the admin user
        $user->posts()->saveMany(
            Post::factory()->count(3)->make()
        );

        new ClearPaginationCache;
    }
}

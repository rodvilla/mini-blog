<?php

namespace App\Console\Commands;

use App\Actions\ImportBlogPostsAction;
use App\Jobs\ImportPostsJob;
use Illuminate\Console\Command;
use Throwable;

class ImportBlogCommand extends Command
{
    protected $signature = 'blog:import';

    protected $description = 'Import new blog posts from the specified endpoint';

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
     */
    public function handle()
    {
        dispatch(new ImportPostsJob);
    }
}

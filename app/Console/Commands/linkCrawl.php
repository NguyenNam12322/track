<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\crawlController;

class linkCrawl extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'link:crawl';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'crawl link';

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
     * @return mixed
     */
    public function handle()
    {
        $crawl = new crawlController();
        return $crawl->crawl();
    }
}

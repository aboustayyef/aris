<?php

namespace Aris\Console\Commands;

use Illuminate\Console\Command;
use Aris\Node;
use \Cache;

class buildPaths extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'aris:buildPaths';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'fills the path property of nodes';

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
        $nodes = Node::all();
        foreach ($nodes as $key => $node) {
            $path = $node->getPath();
            $node->path = $path;
            $node->save();
            $this->info($path);   
            Cache::flush();
        }
        $this->info('Cache Cleared');
    }
}

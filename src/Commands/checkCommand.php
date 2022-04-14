<?php

namespace Arsoft\Module\Commands;

use Illuminate\Console\Command;

class checkCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'armodule:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'check aja gan';

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
     * @return int
     */
    public function handle()
    {

        $path = app_path().'\Modules';
        mkdir($path.'/Local');

        return 0;
    }
}

<?php

namespace Swamsid\SModules;

use Illuminate\Support\ServiceProvider;
use Swamsid\Smodules\Commands\initModuleCommand;
use Swamsid\Smodules\Commands\makeModuleCommand;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            // publish config file
        
            $this->commands([
                // initModuleFrontendCommand::class,
                // makeModuleFrontendCommand::class,

                initModuleCommand::class,
                makeModuleCommand::class,
            ]);
        }
    }
}

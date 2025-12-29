<?php

namespace App\Modules;

use Illuminate\Support\ServiceProvider;

class moduleServiceProvider extends ServiceProvider
{

    protected $path = '';

    /**
     * Will make sure that the required modules have been fully loaded
     * @return void
     */
    public function boot()
    {
        // For each of the registered modules, include their routes and Views
        $this->initiateModules('Modules');
    }

    public function register()
    {

        $this->initiateProvider('Modules');
    }

    private function initiateModules(String $path){
        $filesystem = $this->app->make('files')->directories(app_path($path));

        foreach($filesystem as $modules){
            $moduleName = last(explode(DIRECTORY_SEPARATOR, $modules));
            $viewPath = app_path() . DIRECTORY_SEPARATOR . $path . DIRECTORY_SEPARATOR . $moduleName . DIRECTORY_SEPARATOR . 'Views';
            
            if(is_dir($viewPath)) {
                $modulesViewName = substr(strtolower(last(explode('Modules', $modules))), 1);
                $modulesViewName = str_replace(DIRECTORY_SEPARATOR, '->', $modulesViewName);

                $this->loadViewsFrom($viewPath, $modulesViewName);
            }else{
                $this->initiateModules($path . DIRECTORY_SEPARATOR . $moduleName);
            }
        }
    }

    private function initiateProvider(String $path)
    {
        $filesystem = $this->app->make('files')->directories(app_path($path));

        foreach ($filesystem as $modules) {
            $moduleName = last(explode(DIRECTORY_SEPARATOR, $modules));
            if (is_dir(app_path() . DIRECTORY_SEPARATOR . $path . DIRECTORY_SEPARATOR . $moduleName . DIRECTORY_SEPARATOR . 'Providers')) {
                $tempPath = str_replace(DIRECTORY_SEPARATOR, '\\', $path);
                $this->app->register("App\\{$tempPath}\\{$moduleName}\\Providers\\routeServiceProvider");
            } else {
                $this->initiateProvider($path . DIRECTORY_SEPARATOR . $moduleName);
            }
        }
    }
}

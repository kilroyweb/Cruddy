<?php

namespace KilroyWeb\Cruddy;

use Illuminate\Support\ServiceProvider;

class CruddyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerCruddy();
    }

    public function registerCruddy(){
        $this->app->bind('cruddy',function() {
            return new Cruddy();
        });
    }

    public function provides()
    {
        return array('cruddy', 'KilroyWeb\Cruddy');
    }
}

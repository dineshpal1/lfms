<?php

namespace App\Providers;
use App\Customfacade\Customfacade;
use Illuminate\Support\ServiceProvider;

class CustomfacadeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('customfacade',function(){
            return new Customfacade();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

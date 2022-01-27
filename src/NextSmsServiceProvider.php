<?php
namespace Filbertmsaki\Nextsms;

use Illuminate\Support\ServiceProvider;

class NextSmsServiceProvider extends ServiceProvider{
    public function boot(){
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views','nextsms');
        $this->mergeConfigFrom(__DIR__.'/config/nextsms.php', 'nextsms');
        $this->publishes([__DIR__.'/config/nextsms.php' => config_path('nextsms.php'),]);

    }
    public function register(){

    }
}
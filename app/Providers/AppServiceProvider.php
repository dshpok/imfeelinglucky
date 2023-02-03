<?php

namespace App\Providers;

use App\Interfaces\LinkInterface;
use App\Interfaces\PlayResultInterface;
use App\Interfaces\RegisterInterface;
use App\Services\LinkService;
use App\Services\PlayResultService;
use App\Services\RegisterService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(RegisterInterface::class, RegisterService::class);
        $this->app->bind(LinkInterface::class, LinkService::class);
        $this->app->bind(PlayResultInterface::class, PlayResultService::class);
    }
}

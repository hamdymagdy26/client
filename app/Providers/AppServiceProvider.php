<?php

namespace App\Providers;

use App\Repositories\Client\ClientRepository;
use App\Repositories\Client\ClientRepositoryInterface;
use App\Services\Client\ClientService;
use App\Services\Client\ClientServiceInterface;
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
         // Client Binding -- binding interface to the concrete class
         $this->app->bind(ClientServiceInterface::class, ClientService::class);
         $this->app->bind(ClientRepositoryInterface::class, ClientRepository::class);
    }
}

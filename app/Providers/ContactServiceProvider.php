<?php

namespace App\Providers;

use Crm\Contacts\ContactInterface;
use Crm\Contacts\Repository\ContactRepository;
use Illuminate\Support\ServiceProvider;

class ContactServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ContactInterface::class,ContactRepository::class);

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

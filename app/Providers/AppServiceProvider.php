<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\TransactionMade;
use App\Listeners\LogTransaction;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register event and listener
        Event::listen(
            TransactionMade::class,
            [LogTransaction::class, 'handle']
        );
    }
}

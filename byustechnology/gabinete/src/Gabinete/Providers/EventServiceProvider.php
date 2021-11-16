<?php

namespace ByusTechnology\Gabinete\Providers;

use ByusTechnology\Gabinete\Listeners\SetPrefeituraIdSession;
use ByusTechnology\Gabinete\Listeners\ClearPrefeituraIdFromSession;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Login::class => [
            SetPrefeituraIdSession::class
        ],
        Logout::class => [
            ClearPrefeituraIdFromSession::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
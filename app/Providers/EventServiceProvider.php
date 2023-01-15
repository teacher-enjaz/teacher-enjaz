<?php

namespace App\Providers;

use App\Events\CardEvent;
use App\Events\DownloadEvent;
use App\Events\ProfileEvent;
use App\Events\ResourceEvent;
use App\Listeners\CardView;
use App\Listeners\DownloadView;
use App\Listeners\ProfileView;
use App\Listeners\ResourceView;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ResourceEvent::class=>[
            ResourceView::class,
        ],
        ProfileEvent::class=>[
            ProfileView::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

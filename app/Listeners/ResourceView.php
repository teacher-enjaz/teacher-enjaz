<?php

namespace App\Listeners;

use App\Events\CardEvent;

use App\Events\ResourceEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ResourceView
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param ResourceEvent $event
     * @return void
     */
    public function handle(ResourceEvent $event)
    {
        if (!session()->has('resourceVisited'.$event->resource->id)) {
            $this->updateViewer($event->resource);
        } else {
            return false;
        }
    }

    function updateViewer($resource)
    {
        $resource->increment('views');
        $resource->save();
        session()->put('resourceVisited'.$resource->id, $resource->id);
    }
}

<?php

namespace App\Listeners;

use App\Events\ProfileEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProfileView
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
     * @param ProfileView $event
     * @return bool
     */
    public function handle(ProfileEvent $event)
    {
        if (!session()->has('profileIsVisited')) {
            $this->updateViewer($event->user);
        } else {
            return false;
        }
    }

    function updateViewer($user)
    {
        $user->profile_views = $user->profile_views + 1;
        $user->save();
        session()->put('profileIsVisited', $user->id);
    }
}

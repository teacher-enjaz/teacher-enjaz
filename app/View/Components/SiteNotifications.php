<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class SiteNotifications extends Component
{
    public $notifications,$unreadCount,$user;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $user = Auth::user();
        $this->user = $user;
        $notifications = $user->notifications()->take(8)->get();
        $this->notifications = $notifications;
        $this->unreadCount = $user->unreadNotifications()->count();
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.site-notifications');
    }
}

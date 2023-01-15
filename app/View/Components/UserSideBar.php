<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class UserSideBar extends Component
{
    public $authUser;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authUser = Auth::user();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user-side-bar');
    }
}

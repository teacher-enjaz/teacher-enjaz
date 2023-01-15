<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\Component;

class SiteAuthUser extends Component
{
    public $authUser,$user;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authUser= Auth::user();
        $identity_no = (int) Session::get('idNo');
        $this->user = User::where(['identity_no'=>$identity_no,'complete'=>1])->first();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.site-auth-user');
    }
}

<?php

namespace App\View\Components;

use App\Models\Rawafed\Information;
use App\Models\Rawafed\StaticPage;
use Illuminate\View\Component;

class Footer extends Component
{

    public $socials,$siteInfo,$staticPages;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->socials = \App\Models\Rawafed\SocialMedia::select('*')->get();
        $this->siteInfo = Information::select('email','mobile')->first();
        $this->staticPages = StaticPage::select('*')->where('status',1)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.footer');
    }
}

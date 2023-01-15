<?php

namespace App\View\Components;

use App\Models\Rawafed\Information;
use Illuminate\View\Component;

class SiteInformation extends Component
{
    public $siteInfo;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->siteInfo = Information::select('logo','favicon')->first();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.site-information');
    }
}

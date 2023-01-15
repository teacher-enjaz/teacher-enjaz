<?php

namespace App\View\Components;

use App\Models\Rawafed\Information;
use Illuminate\View\Component;

class Favicon extends Component
{
    public $site;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->site = Information::select('*')->first();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.favicon');
    }
}

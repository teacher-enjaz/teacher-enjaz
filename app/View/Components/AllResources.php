<?php

namespace App\View\Components;

use App\Models\Rawafed\Level;
use Illuminate\View\Component;

class AllResources extends Component
{
    public $levels;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->levels= (new Level())->getLevelWithGrades();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.all-resources');
    }
}

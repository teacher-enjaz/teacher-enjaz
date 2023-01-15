<?php

namespace App\View\Components;

use App\Http\Requests\Rawafed\LessonRequest;
use App\Models\Rawafed\Level;
use App\Models\Rawafed\Semester;
use App\Rawafed\Repositories\LevelRepository;
use Illuminate\View\Component;

class Grades extends Component
{
    public $levels,$semesters;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->levels= (new Level())->getLevelWithGrades();
        $this->semesters= (new Semester())->all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.grades');
    }
}

<?php

namespace App\View\Components;

use App\Models\TV\Broadcast;
use App\Models\TV\Program;
use Illuminate\View\Component;

class TVpulse extends Component
{
    public $pulsclass = "blob gray";
    public $pulsId = "grayInactive";
    public $notice = false;
    public $message = "";
    public $broadcast;
    public $programs;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->programs = Program::where('status', 1)->get();
        $this->broadcast = Broadcast::first();
        if (isset($this->broadcast))
        {
            if (date('D') == 'Fri' || date('D') == 'Sat') {
                $this->pulsclass = "blob gray";
                $this->pulsId = "grayInactive";
                $this->notice = true;
            }
            elseif ($this->broadcast->status == 0)
            {
                $this->pulsclass = "blob gray";
                $this->pulsId = "grayInactive";
                $this->notice = true;
            }
            else
            {
                if (/*(getdate()['hours'] > 7 && getdate()['hours'] < 24) && */$this->broadcast->status == 1)
                {
                    $this->pulsclass = "blob red";
                    $this->pulsId = "pulseActive";
                }
                else
                {
                    $this->pulsclass = "blob gray";
                    $this->pulsId = "grayInactive";
                }
            }
        }
        else
        {
            $this->message = "عذراً ،،، يتم تجهيز رابط البث قم بزيارة الموقع بعد قليل";
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.t-vpulse');
    }
}

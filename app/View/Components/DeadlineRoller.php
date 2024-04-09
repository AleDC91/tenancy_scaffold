<?php

namespace App\View\Components;

use App\Models\YearlyDeadline;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class DeadlineRoller extends Component
{
    /**
     * Create a new component instance.
     */
    public Collection $deadlines;

    public function __construct(){
        $this->deadlines = YearlyDeadline::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.deadline-roller', ['deadlines' => $this->deadlines]);
    }
}

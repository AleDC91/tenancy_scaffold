<?php

namespace App\View\Components;

use App\Models\YearlyDeadline;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class DeadlinesTable extends Component
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
        $deadlines = YearlyDeadline::all();
        return view('components.deadlines-table', ['deadlines' => $this->deadlines]);
    }
}

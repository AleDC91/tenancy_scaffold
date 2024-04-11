<?php

namespace App\View\Components;

use App\Models\YearlyDeadline;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EditDeadline extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public YearlyDeadline $deadline){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.edit-deadline', ['deadline' => $this->deadline]);
    }
}

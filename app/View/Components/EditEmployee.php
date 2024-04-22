<?php

namespace App\View\Components;

use App\Models\Employee;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EditEmployee extends Component
{
    /**
     * Create a new component instance.
     */

     public $employee;
    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.edit-employee');
    }
}

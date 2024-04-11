<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;
use Spatie\Permission\Models\Role;

class EmployeesTable extends Component
{

    public Collection $employees;

    public function __construct()
    {
        $clientRole = Role::where('name', 'employee')->first();
        $this->employees = $clientRole->users;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.employees-table', ['employees' => $this->employees]);
    }
}

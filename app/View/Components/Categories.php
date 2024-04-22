<?php

namespace App\View\Components;

use App\Models\ClientTypes;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Categories extends Component
{
    /**
     * Create a new component instance.
     */
    public Collection $categories;
    public function __construct()
    {
        $this->categories = ClientTypes::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.categories', ['categories' => $this->categories]);
    }
}

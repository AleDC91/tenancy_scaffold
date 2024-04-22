<?php

namespace App\View\Components;

use App\Models\ClientTypes;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EditCategory extends Component
{
    /**
     * Create a new component instance.
     */

     public $category;
    public function __construct(ClientTypes $category)
    {
        $this->category = $category;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.edit-category');
    }
}

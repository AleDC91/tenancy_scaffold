<?php

namespace App\View\Components;

use App\Models\ClientAnnualDeadline;
use App\Models\YearlyDeadline;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Deadlines extends Component
{
    /**
     * Create a new component instance.
     */

     public $nextDeadlines;

    public function __construct()
    {
        // Trova la data della prossima scadenza annuale
        $nextDeadlineId = YearlyDeadline::where('date', '>=', now())->orderBy('date')->value('id');

        // Trova tutti i record della tabella pivot client_annual_deadlines che corrispondono alla prossima scadenza
        $this->nextDeadlines = ClientAnnualDeadline::where('deadline_id', $nextDeadlineId)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.deadlines');
    }
}

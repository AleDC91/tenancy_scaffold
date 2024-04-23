<?php

namespace App\View\Components;

use App\Models\ClientAnnualDeadline;
use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PieChartOne extends Component
{
    /**
     * Create a new component instance.
     */
    public $clientsDeadlines;
    public function __construct()
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        $this->clientsDeadlines = ClientAnnualDeadline::whereHas('deadline', function ($query) use ($startOfMonth, $endOfMonth) {
            $query->whereBetween('date', [$startOfMonth, $endOfMonth]);
        })->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.pie-chart-one');
    }
}

<?php

namespace App\View\Components;


use App\Models\ClientAnnualDeadline;
use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GraphOne extends Component
{
    /**
     * Create a new component instance.
     */

     public $annualDeadlines;
     public $monthlyCounts = [];
 
     /**
      * Create a new component instance.
      */
     public function __construct()
     {
         // Ottieni la data di inizio e fine del mese corrente
         $startOfYear = Carbon::now()->startOfYear();
         $endOfYear = Carbon::now()->endOfYear();
 
         // Seleziona le scadenze annuali per l'anno corrente con la relazione
         $this->annualDeadlines = ClientAnnualDeadline::with('deadline')
             ->whereHas('deadline', function ($query) use ($startOfYear, $endOfYear) {
                 $query->whereBetween('date', [$startOfYear, $endOfYear]);
             })
             ->get();
 
         // Raggruppa le scadenze per mese e contale
         $this->monthlyCounts = $this->annualDeadlines->groupBy(function ($deadline) {
             return Carbon::parse($deadline->deadline->date)->month;
         })->map->count();
     }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.graph-one');
    }
}

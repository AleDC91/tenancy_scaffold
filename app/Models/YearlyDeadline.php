<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;

class YearlyDeadline extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'date',
    ];

    public function remainingDays(){
        $now = Carbon::now();
        $deadlineDate = Carbon::createFromFormat('Y-m-d', $this->date); 

        return $now->diffInDays($deadlineDate); 
    }
    
    public function isPassed(){
        $deadlineDate = Carbon::createFromFormat('Y-m-d', $this->date); // Converti la data della scadenza in un oggetto Carbon
    
        return $deadlineDate->isPast(); // Verifica se la data della scadenza è nel passato
    }
    
}

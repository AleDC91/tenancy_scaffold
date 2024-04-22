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

    public function remainingDays()
    {
        $now = Carbon::now();
        $deadlineDate = Carbon::createFromFormat('Y-m-d', $this->date);

        return $now->diffInDays($deadlineDate);
    }

    public function isPassed()
    {
        $deadlineDate = Carbon::createFromFormat('Y-m-d', $this->date); // Converti la data della scadenza in un oggetto Carbon

        return $deadlineDate->isPast(); // Verifica se la data della scadenza è nel passato
    }

    public function clientTypes()
    {
        return $this->belongsToMany(ClientTypes::class, 'annual_deadline_client_types', 'annual_deadline_id', 'client_type_id');
    }
    public function clients()
    {
        return $this->belongsToMany(Client::class, 'client_annual_deadlines', 'deadline_id', 'client_id');
    }
}

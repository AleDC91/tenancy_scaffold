<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientAnnualDeadline extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'deadline_id',
        'status'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function deadline()
    {
        return $this->belongsTo(YearlyDeadline::class, 'deadline_id');
    }
}

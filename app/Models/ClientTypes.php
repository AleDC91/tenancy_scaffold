<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientTypes extends Model
{
    use HasFactory;


    public function clients()
    {
        return $this->belongsToMany(Client::class, 'client_client_type');
    }

    public function yearlyDeadlines()
{
    return $this->belongsToMany(YearlyDeadline::class, 'annual_deadline_client_type');
}
}

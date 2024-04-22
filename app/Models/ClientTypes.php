<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientTypes extends Model
{
    use HasFactory;
    protected $table = 'client_types';

    protected $fillable = ['name'];

    public function clients()
    {
        return $this->belongsToMany(Client::class, 'client_client_types', 'client_type_id', 'client_id');
    }

    public function yearlyDeadlines()
{
    return $this->belongsToMany(YearlyDeadline::class, 'annual_deadline_client_types', 'annual_deadline_id', 'client_type_id');
}
}

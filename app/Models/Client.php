<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'regime_id',
        'job',
        'job_description',
        'acquisition_date',
        'annual_turnover',
        'has_employees',
        'CF',
        'properties',
        'clinic_address',
        'employee_id',
    ];


    protected $hidden = [
        'CF',
        'properties',
        'annual_turnover',
        'regime_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function clientTypes()
    {
        return $this->belongsToMany(ClientTypes::class, 'client_client_types', 'client_id', 'client_type_id');
    }

    public function yearlyDeadlines()
    {
        return $this->belongsToMany(YearlyDeadline::class, 'client_annual_deadlines', 'client_id', 'deadline_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'user_id');
    }

    public function messages(){
        return $this->hasMany(Message::class, 'user_id') ;
    }
}

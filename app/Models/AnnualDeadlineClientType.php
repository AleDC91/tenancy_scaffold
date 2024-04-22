<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnualDeadlineClientType extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_type_id',
        'annual_deadline_id'
    ];
}

<?php

namespace App\Observers;

use App\Models\Client;
use App\Models\Employee;
use App\Models\User;

class EmployeeObserver
{
    /**
     * Handle the Employee "created" event.
     */
    public function created(Employee $employee): void
    {
        //
    }

    /**
     * Handle the Employee "updated" event.
     */
    public function updated(Employee $employee): void
    {
        //
    }

    /**
     * Handle the Employee "deleted" event.
     * L'ho cambiato in deleting, cosi agisce PRIMA che employee venga cancellato!
     */
    public function deleting(Employee $employee): void
    {
         $admin = User::role('admin')->whereHas('employee')->first();

         if ($admin) {
             // Assegna tutti i Clients dell'Employee cancellato all'admin
             Client::where('employee_id', $employee->user_id)
                 ->update(['employee_id' => $admin->id]);
         }
    }

    /**
     * Handle the Employee "restored" event.
     */
    public function restored(Employee $employee): void
    {
        //
    }

    /**
     * Handle the Employee "force deleted" event.
     */
    public function forceDeleted(Employee $employee): void
    {
        //
    }
}

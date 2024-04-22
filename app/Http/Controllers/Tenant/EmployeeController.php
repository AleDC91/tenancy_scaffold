<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tenant.employees.employees');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tenant.employees.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        DB::beginTransaction();

        try {
            // Create a new user
            $user = new User();
            $user->name = $request->employee_name;
            $user->email = $request->employee_email;
            $user->password = bcrypt($request->employee_password);
            $user->save();
            $user->assignRole('employee');

            // Create the associated employee record
            $employee = new Employee();
            $employee->salary = $request->employee_salary;
            $employee->position = $request->employee_position;
            $employee->hire_date = $request->employee_hire_date; 
            $employee->user_id = $user->id; 
            $employee->save();

            // Commit the transaction
            DB::commit();

            return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
        } catch (\Exception $e) {
            // If an exception occurs, roll back the transaction
            DB::rollBack();
            $errorMsg = $e->getMessage();
            // Redirect back with an error message
            return back()->with('error', $errorMsg);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('tenant.employees.edit', ['employee' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        DB::beginTransaction();
    
        try {
            // Update user data
            $employee->user->name = $request->employee_name;
            $employee->user->email = $request->employee_email;
            $employee->user->save();
    
            // Update employee data
            $employee->salary = $request->employee_salary;
            $employee->position = $request->employee_position;
            $employee->hire_date = $request->employee_hire_date;
            $employee->save();
    
            // Commit the transaction
            DB::commit();
    
            return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
        } catch (\Exception $e) {
            // If an exception occurs, roll back the transaction
            DB::rollBack();
            $errorMsg = $e->getMessage();
            // Redirect back with an error message
            return back()->with('error', $errorMsg);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        try{
            $employee->delete();
            return redirect()->route('tenant.admin')->with('success', 'Category deleted successfully');
        }catch (\Exception $e) {
            
            if ($e instanceof AuthorizationException) {
                return redirect()->back()->with('error', "You're not allowed to delete this category.");
            } else {
                return redirect()->back()->with('error', "Error while deleting category: " . $e->getMessage());
            }
        }
    }
}

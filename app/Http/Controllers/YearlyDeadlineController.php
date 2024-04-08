<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreYearlyDeadlineRequest;
use App\Http\Requests\UpdateYearlyDeadlineRequest;
use App\Models\YearlyDeadline;
use Illuminate\Auth\Access\AuthorizationException;

class YearlyDeadlineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tenant.deadlines.deadlines');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tenant.deadlines.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreYearlyDeadlineRequest $request)
    {
        try {

            $this->authorize('create', YearlyDeadline::class);

            $yearlyDeadline = YearlyDeadline::create([
                'name' => $request->input('deadline_name'),
                'description' => $request->input('deadline_description'),
                'date' => $request->input('deadline_date'), 
            ]);

        } catch (\Exception $e) {
            
            if ($e instanceof AuthorizationException) {
                return redirect()->back()->with('error', "You're not allowed create a new deadline!.");
            } else {
                return redirect()->back()->with('error', "Error while creating new deadline: " . $e->getMessage());
            }
        }
        return redirect()->back()->with('success', 'New deadline created');
    }


    /**
     * Display the specified resource.
     */
    public function show(YearlyDeadline $yearlyDeadline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(YearlyDeadline $yearlyDeadline)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateYearlyDeadlineRequest $request, YearlyDeadline $yearlyDeadline)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(YearlyDeadline $yearlyDeadline)
    {
        //
    }
}

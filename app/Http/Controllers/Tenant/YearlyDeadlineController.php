<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
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
        return redirect()->route('deadlines.index')->with('success', 'New deadline created');
    }


    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $deadline = YearlyDeadline::find($id);
        $remainingDays = $deadline->remainingDays();
        $passed = $deadline->isPassed();

        return view('tenant.deadlines.show', ['deadline' => $deadline, 'remainingDays' => $remainingDays, 'isPassed' => $passed]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(YearlyDeadline $deadline)
    {
        return view('tenant.deadlines.edit', ['deadline' => $deadline]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateYearlyDeadlineRequest $request, YearlyDeadline $deadline)
    {
        $request->validated();

        $deadline->update([
            'name' => $request->deadline_name,
            'description' => $request->deadline_description,
            'date' => $request->deadline_date,
        ]);

        return redirect()->route('deadlines.index')->with('success', 'Deadline updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(YearlyDeadline $deadline)
    {
        $deadline->delete();

        return redirect()->route('deadlines.index')->with('success', 'Deadline deleted successfully');
    }
}

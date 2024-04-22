<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientAnnualDeadlineRequest;
use App\Http\Requests\UpdateClientAnnualDeadlineRequest;
use App\Models\Client;
use App\Models\ClientAnnualDeadline;
use App\Models\YearlyDeadline;
use Illuminate\Auth\Access\AuthorizationException;

class ClientAnnualDeadlineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientAnnualDeadlineRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ClientAnnualDeadline $clientAnnualDeadline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClientAnnualDeadline $clientAnnualDeadline)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientAnnualDeadlineRequest $request, Client $client, YearlyDeadline $deadline)
    {
        try {
            $client->yearlyDeadlines()->updateExistingPivot($deadline->id, ['status' => 'completed']);
            return redirect()->back()->with('success', 'Marked as Done!');
        } catch (\Exception $e) {

            if ($e instanceof AuthorizationException) {
                return redirect()->back()->with('error', "You're not allowed to update this deadline status.");
            } else {
                return redirect()->back()->with('error', "Error while updating deadline status: " . $e->getMessage());
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClientAnnualDeadline $clientAnnualDeadline)
    {
        //
    }
}

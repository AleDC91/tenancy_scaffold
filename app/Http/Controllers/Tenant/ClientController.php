<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\AnnualDeadlineClientType;
use App\Models\Client;
use App\Models\ClientAnnualDeadline;
use App\Models\ClientClientType;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tenant.clients.clients');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tenant.clients.create');
    }

    public function show(Client $client)
    {
        return view('tenant.clients.show', ['client' => $client]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        DB::beginTransaction();

        try {
            $user = new User();
            $user->name = $request->client_name;
            $user->email = $request->client_email;
            $user->password = bcrypt($request->client_password);
            $user->save();
            $user->assignRole('client');

            $client = new Client();
            $client->job = $request->client_job;
            $client->job_description = $request->client_job_description;
            $client->CF = $request->client_CF;
            $client->regime_id = $request->client_regime;
            $client->acquisition_date = $request->client_acquisition_date;
            $client->annual_turnover = $request->client_annual_turnover;
            $client->last_year_turnover = $request->client_annual_turnover_last_year;
            $client->two_years_ago_turnover = $request->client_annual_turnover_two_years_ago;
            $client->clinic_address = $request->client_clinic_address;
            $client->has_employees = $request->has('client_has_employees');
            $client->properties = $request->has('client_has_properties');
            $client->employee_id = $request->client_employee;
            $client->id = $user->id;

            $client->save();

            foreach ($request->client_types as $client_type_id) {
                $clientClientType = new ClientClientType();
                $clientClientType->client_id = $user->id; // ID del cliente appena creato
                $clientClientType->client_type_id = $client_type_id; // ID del tipo di cliente corrente
                $clientClientType->save();
            }

            foreach ($request->client_types as $client_type_id) {
                // Trova tutte le associazioni AnnualDeadlineClientType con questo client_type_id
                $annualDeadlineClientTypes = AnnualDeadlineClientType::where('client_type_id', $client_type_id)->get();

                // Itera su ciascuna associazione AnnualDeadlineClientType trovata
                foreach ($annualDeadlineClientTypes as $annualDeadlineClientType) {
                    // Creare un record ClientAnnualDeadline per il cliente corrente e la scadenza annuale associata
                    $clientAnnualDeadline = new ClientAnnualDeadline();
                    $clientAnnualDeadline->client_id = $user->id; // ID del cliente
                    $clientAnnualDeadline->deadline_id = $annualDeadlineClientType->annual_deadline_id; // ID della scadenza annuale
                    $clientAnnualDeadline->status = 'pending';
                    $clientAnnualDeadline->save();
                }
            }


            DB::commit();

            return redirect()->route('clients.index')->with('success', 'Client created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            $errorMsg = $e->getMessage();
            return back()->with('error', $errorMsg);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {

        return view('tenant.clients.edit', ['client' => $client]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {

        // dd($request);
        DB::beginTransaction();

        try {
            $client->job = $request->client_job;
            $client->job_description = $request->client_job_description;
            $client->CF = $request->client_CF;
            $client->regime_id = $request->client_regime;
            $client->acquisition_date = $request->client_acquisition_date;
            $client->annual_turnover = $request->client_annual_turnover;
            $client->last_year_turnover = $request->client_annual_turnover_last_year;
            $client->two_years_ago_turnover = $request->client_annual_turnover_two_years_ago;
            $client->clinic_address = $request->client_clinic_address;
            $client->has_employees = $request->has('client_has_employees');
            $client->properties = $request->has('client_has_properties');
            $client->employee_id = $request->client_employee;

            $client->save();

            $client->user->name = $request->client_name;
            $client->user->email = $request->client_email;

            $client->user->save();


            // Aggiornamento dei tipi di cliente associati
            if ($request->has('client_types')) {
                $client->clientTypes()->sync($request->client_types);
                $client->clientTypes->each(function ($clientType) use ($client, $request) {
                    $clientType->yearlyDeadlines()->sync($request->yearly_deadlines);
                });
            }


            ClientAnnualDeadline::where('client_id', $client->id)->delete();

            // Itera su ogni client_type_id dalla richiesta
            foreach ($request->client_types as $client_type_id) {
                // Trova tutte le associazioni AnnualDeadlineClientType con questo client_type_id
                $annualDeadlineClientTypes = AnnualDeadlineClientType::where('client_type_id', $client_type_id)->get();

                // Itera su ciascuna associazione AnnualDeadlineClientType trovata
                foreach ($annualDeadlineClientTypes as $annualDeadlineClientType) {
                    // Creare un record ClientAnnualDeadline aggiornato per il cliente corrente e la scadenza annuale associata
                    $clientAnnualDeadline = new ClientAnnualDeadline();
                    $clientAnnualDeadline->client_id = $client->id; // ID del cliente
                    $clientAnnualDeadline->deadline_id = $annualDeadlineClientType->annual_deadline_id; // ID della scadenza annuale
                    $clientAnnualDeadline->status = 'pending';
                    $clientAnnualDeadline->save();
                }
            }

            DB::commit();

            return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            $errorMsg = $e->getMessage();

            return back()->with('error', $errorMsg);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        try {
            $client->delete();
            return redirect()->back()->with('success', 'Client deleted successfully');
        } catch (\Exception $e) {

            if ($e instanceof AuthorizationException) {
                return redirect()->back()->with('error', "You're not allowed to delete this client.");
            } else {
                return redirect()->back()->with('error', "Error while deleting client: " . $e->getMessage());
            }
        }
    }
}

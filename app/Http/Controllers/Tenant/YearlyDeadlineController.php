<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreYearlyDeadlineRequest;
use App\Http\Requests\UpdateYearlyDeadlineRequest;
use App\Models\AnnualDeadlineClientType;
use App\Models\ClientAnnualDeadline;
use App\Models\ClientTypes;
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
            // Creare la nuova scadenza annuale
            $yearlyDeadline = YearlyDeadline::create([
                'name' => $request->input('deadline_name'),
                'description' => $request->input('deadline_description'),
                'date' => $request->input('deadline_date'),
            ]);
    
            // Ottenere i client_types dall'input della richiesta
            $clientTypes = $request->input('client_types');
    
            // Ciclare su ogni client_type ricevuto nella richiesta
            foreach ($clientTypes as $clientType) {
                // Creare un record nella tabella AnnualDeadlineClientType
                AnnualDeadlineClientType::create([
                    'annual_deadline_id' => $yearlyDeadline->id,
                    'client_type_id' => $clientType,
                ]);
    
                // Ottenere tutti i clienti associati a questo client_type
                $clients = ClientTypes::findOrFail($clientType)->clients;
    
                // Associare ciascun cliente alla nuova scadenza annuale
                foreach ($clients as $client) {
                    // Controllare se il record esiste già
                    ClientAnnualDeadline::updateOrCreate(
                        [
                            'deadline_id' => $yearlyDeadline->id,
                            'client_id' => $client->id,
                        ],
                        // Se il record esiste già, non fare nulla
                        // Altrimenti, crea un nuovo record
                        []
                    );
                }
            }
    
            // Successo: reindirizzare all'indice delle scadenze annue con un messaggio di successo
            return redirect()->route('deadlines.index')->with('success', 'New deadline created successfully');
        } catch (\Exception $e) {
            // Gestione degli errori
            if ($e instanceof AuthorizationException) {
                return redirect()->back()->with('error', "You're not allowed create a new deadline!.");
            } else {
                return redirect()->back()->with('error', "Error while creating new deadline: " . $e->getMessage());
            }
        }
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
    public function update(UpdateYearlyDeadlineRequest $request, $id)
{
    try {
        // Trovare la scadenza annuale da aggiornare
        $yearlyDeadline = YearlyDeadline::findOrFail($id);

        // Aggiornare i campi della scadenza annuale con i nuovi valori dalla richiesta
        $yearlyDeadline->update([
            'name' => $request->input('deadline_name'),
            'description' => $request->input('deadline_description'),
            'date' => $request->input('deadline_date'),
        ]);

        // Ottenere i client_types dall'input della richiesta
        $clientTypes = $request->input('client_types');

        // Rimuovere tutti i clienti associati alla scadenza annuale prima di aggiornarli
        $yearlyDeadline->clientTypes()->detach();

        // Ciclare su ogni client_type ricevuto nella richiesta
        foreach ($clientTypes as $clientType) {
            // Creare o aggiornare un record nella tabella AnnualDeadlineClientType
            AnnualDeadlineClientType::updateOrCreate(
                [
                    'annual_deadline_id' => $yearlyDeadline->id,
                    'client_type_id' => $clientType,
                ],
                []
            );

            // Ottenere tutti i clienti associati a questo client_type
            $clients = ClientTypes::findOrFail($clientType)->clients;

            // Associare ciascun cliente alla scadenza annuale aggiornata
            foreach ($clients as $client) {
                // Controllare se il record esiste già
                ClientAnnualDeadline::updateOrCreate(
                    [
                        'deadline_id' => $yearlyDeadline->id,
                        'client_id' => $client->id,
                    ],
                    
                    // Se il record esiste già, non fare nulla
                    // Altrimenti, crea un nuovo record
                    []
                );
            }
        }

        // Successo: reindirizzare all'indice delle scadenze annue con un messaggio di successo
        return redirect()->route('deadlines.index')->with('success', 'Deadline updated successfully');
    } catch (\Exception $e) {
        // Gestione degli errori
        if ($e instanceof AuthorizationException) {
            return redirect()->back()->with('error', "You're not allowed to update this deadline.");
        } else {
            return redirect()->back()->with('error', "Error while updating deadline: " . $e->getMessage());
        }
    }
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

<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return View('tenant.inbox.inbox');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return View('tenant.inbox.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMessageRequest $request)
    {
        // dd($request);
        try {
            $message = new Message();
            $message->user_id = $request->user_id;
            $message->body = $request->message;
            $message->priority = $request->priority;
            $message->save();
            return back()->with('success', 'message sent successfully!');
        } catch (\Exception $e) {
            $errorMsg = $e->getMessage();
            return back()->with('error', $errorMsg);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $messageId)
    {
        $message = Message::find($messageId);
        return view('tenant.inbox.show', ['message' => $message]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMessageRequest $request, int $messageId)
    {

        $message = Message::find($messageId);
        $message->update([
            'read' => $request->read,
            'read_at' => Carbon::now()
        ]);

        return response()->json(['message' => 'Messaggio aggiornato correttamente', 'data' => $message], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }
}

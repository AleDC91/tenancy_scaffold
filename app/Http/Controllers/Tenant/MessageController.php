<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\Message;
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
    //    dd($request);
    $request->validate([

        'docs.*' => 'required|mimes:pdf'
    ]);

    if($files = $request->file('docs')){
        foreach($files as $file){
            $extension = $file->getClientOriginalExtension();
            $filename = time();
        }
    }

    }
    
    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
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
    public function update(UpdateMessageRequest $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tenant.inbox.inbox');
    }

}

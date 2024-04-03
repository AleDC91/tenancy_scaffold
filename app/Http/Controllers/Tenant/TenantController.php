<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function dashboard() {
        return view('tenant.dashboard');
    }

    public function index(){
        return view('tenant.welcome');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{

    public function index()
    {
        $tenants = Tenant::all();
        $today = Carbon::today()->toDateString(); // Ottieni la data di oggi come stringa

        $todaySubscribers = $tenants->where('created_at', '>=', $today . ' 00:00:00')
            ->where('created_at', '<=', $today . ' 23:59:59')
            ->count();
        return view('admin.admin', ['tenants' => $tenants, 'todaySubscribers' => $todaySubscribers]);
    }
}

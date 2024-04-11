<?php

namespace App\View\Components;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;
use Spatie\Permission\Models\Role;

class ClientsTable extends Component
{

    public Collection $clients;

    public function __construct()
    {
        $clientRole = Role::where('name', 'client')->first();
        $this->clients = $clientRole->users;
    }

    public function render(): View|Closure|string
    {
        return view('components.clients-table', ['clients' => $this->clients]);
    }
}

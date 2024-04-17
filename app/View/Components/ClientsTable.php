<?php

namespace App\View\Components;

use App\Models\Client;
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
        $this->clients = Client::all();
    }

    public function render(): View|Closure|string
    {
        return view('components.clients-table', ['clients' => $this->clients]);
    }
}

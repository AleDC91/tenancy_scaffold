@php
    use Carbon\Carbon;

    $today = Carbon::today();
    $next = \App\Models\YearlyDeadline::whereDate('date', '>=', $today)->orderBy('date', 'asc')->first();

    $clients = \App\Models\Client::count();

@endphp


<div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-3">
    <x-dashboard-header-squares title="Clients" :data="$clients" color="red" />
    <x-dashboard-header-squares title="Next" :data="$next->date" color="blue" />
    <x-dashboard-header-squares title="Titolo3" :data="$clients" color="green" />
    <x-dashboard-header-squares title="Titolo4" :data="$clients" color="yellow" />
</div>

@role('employee')
    @unlessrole('admin')
        <?php
        $employeeId = Auth::user()->id;
        $clients = \App\Models\Client::where('employee_id', $employeeId)->get();
        ?>
    @endunlessrole
@endrole

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>

                <th scope="col" class="px-6 py-3">
                    Client
                </th>
                <th scope="col" class="px-6 py-3">
                    Job
                </th>
                <th scope="col" class="px-6 py-3">
                    Regime
                </th>
                <th scope="col" class="px-6 py-3">
                    Deadlines this month
                </th>
                <th scope="col" class="px-6 py-3">
                    Followed by
                </th>
                <th scope="col" class="px-6 py-3">
                    Turnover
                </th>
                @role('admin')
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                @endrole
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                    <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <a href="clients/{{ $client->id }}" class="flex items-center">
                            <img class="w-10 h-10 rounded-full" src={{ $client->user->profile_image }} alt="Jese image">
                            <div class="ps-3">
                                <div class="text-base font-semibold">{{ $client->user->name }}</div>
                                <div class="font-normal text-gray-500">{{ $client->user->email }}</div>
                            </div>
                        </a>
                    </th>
                    <td class="px-6 py-4">
                        {{ $client->job }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            @php
                                switch ($client->regime_id) {
                                    case '1':
                                        $regime = 'Forfettario';
                                        $class =
                                            'bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full';
                                        break;
                                    case '2':
                                        $regime = 'Ordinario';

                                        $class =
                                            'bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300';
                                        break;
                                    case '3':
                                        $regime = 'Speciale';

                                        $class =
                                            'bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300';
                                        break;
                                    default:
                                        $class = '';
                                }
                            @endphp

                            <p class="{{ $class }}">
                                {{ $regime }}</p>
                        </div>
                    <th scope="col" class="px-6 py-3">
                        @php
                            echo count(
                                $client->yearlyDeadlines->filter(function ($deadline) {
                                    // Converte la stringa della data in un oggetto Carbon
                                    $deadlineDate = Carbon\Carbon::parse($deadline->date);
                                    // Controlla se il mese della scadenza è uguale al mese corrente
                                    return $deadlineDate->month == now()->month;
                                }),
                            );
                        @endphp

                    </th>
                    </td>
                    <td class="px-6 py-4">
                        {{ $client->employee->user->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $client->annual_turnover }}€
                    </td>
                    @role('admin')
                        <td>

                            <div class="flex justify-evenly">
                                <a href="{{ route('clients.edit', ['client' => $client]) }}"
                                    class="font-medium text-blue-600  hover:underline me-5">Edit</a>
                                <form action="{{ route('clients.destroy', ['client' => $client]) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this client?')">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="font-medium text-red-600  hover:underline">Delete</button>
                                </form>
                        </td>
                    @endrole
                </tr>
            @endforeach


        </tbody>
    </table>
</div>

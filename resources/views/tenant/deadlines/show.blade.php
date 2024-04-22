@hasanyrole('admin|employee')
    <x-tenant-dashboard>
        <x-sidebar>
            <x-back-button />
            <div class="border m-4 p-4">
                <h1 class="text-2xl text-center my-12">
                    {{ $deadline->name }}
                </h1>
                <p class="italic mb-5">{{ $deadline->description }}</p>
                @php
                    if ($remainingDays == 0) {
                        echo '<p class="my-3 float-end lg:me-11 text-xl">Due date today!</p>';
                    } else {
                        echo $isPassed
                            ? "<p class='my-3 float-end lg:me-11 text-xl'>Expired $remainingDays days ago</p>"
                            : "<p class='my-3 float-end lg:me-11 text-xl'>Due date in $remainingDays days</p>";
                    }
                @endphp
                <div>

                    @php

                        $clientsWithDeadline = collect();
                        $clientTypes = $deadline->clientTypes;
                        foreach ($clientTypes as $clientType) {
                            $clientsOfType = $clientType->clients;
                            $clientsWithDeadline = $clientsWithDeadline->merge($clientsOfType);
                        }
                        $clientsWithDeadline = $clientsWithDeadline->unique(function ($client) {
                            return $client->id;
                        });

                        $clientsWithDeadline = $clientsWithDeadline->filter(function ($client) {
                            if (Auth::user()->hasRole('employee')) {
                                return $client->employee_id == Auth::id();
                            } else {
                                return true; // Per gli admin, non filtrare i clienti
                            }
                        });

                        echo " <h2 class='text-3xl my-5'>Clients (" . count($clientsWithDeadline) . ')</h2>';
                    @endphp
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-20">
                        <table class="max-w-md text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <th scope="col" class="px-6 py-3">Client</th>
                                <th scope="col" class="px-6 py-3">Status</th>
                            </thead>
                            <tbody>

                                @foreach ($clientsWithDeadline as $client)
                                    <tr>
                                        <td class="px-6 py-4 max-w-md">
                                            <a href="{{route('clients.show', ['client' => $client])}}">
                                                {{ $client->user->name }}
                                            </a>
                                        </td>

                                        @php
                                            $pivotRecord = DB::table('client_annual_deadlines')
                                                ->where('client_id', $client->id)
                                                ->where('deadline_id', $deadline->id)
                                                ->first();

                                            $class = '';
                                            if ($pivotRecord) {
                                                switch ($pivotRecord->status) {
                                                    case 'pending':
                                                        $class =
                                                            'inline bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300';
                                                        break;
                                                    case 'completed':
                                                        $class =
                                                            'inline bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full';
                                                        break;
                                                    case 'missed':
                                                        $class =
                                                            'inline bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full';
                                                        break;
                                                    default:
                                                        $class = '';
                                                }
                                                echo "<td class='px-6 py-4'>";
                                                echo "<p class='$class'>$pivotRecord->status</p>";
                                            } else {
                                                echo '<td class="px-6 py-4">N/A</td>';
                                            }
                                        @endphp
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </x-sidebar>
    </x-tenant-dashboard>
@endhasanyrole

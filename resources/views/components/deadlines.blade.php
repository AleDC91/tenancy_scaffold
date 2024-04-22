<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

            <th scope="col" class="px-6 py-3">
                Client
            </th>
            <th scope="col" class="px-6 py-3">
                Due date
            </th>
            <th scope="col" class="px-6 py-3 text-center">
                Status
            </th>

            </tr>
        </thead>
        <tbody>
            @foreach ($nextDeadlines as $clientAnnualDeadline)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                    <th scope="row"
                        class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-10 h-10 rounded-full" src={{ $clientAnnualDeadline->client->user->profile_image }}
                            alt="Jese image">
                        <div class="ps-3">
                            <div class="text-base font-semibold">{{ $clientAnnualDeadline->client->user->name }}</div>
                            <div class="font-normal text-gray-500">{{ $clientAnnualDeadline->client->user->email }}
                            </div>
                        </div>
                    </th>
                    <td class="px-6 py-4">
                        {{ $clientAnnualDeadline->deadline->date }}
                    </td>

                    @php

                        switch ($clientAnnualDeadline->status) {
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
                        echo "<td class='px-6 py-4 text-center'>";
                        echo "<p class='$class ' >$clientAnnualDeadline->status</p>";

                    @endphp

                </tr>
            @endforeach

        </tbody>
    </table>
</div>

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
                    Turnover
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    <img class="w-10 h-10 rounded-full" src={{ $client->user->profile_image }} alt="Jese image">
                    <div class="ps-3">
                        <div class="text-base font-semibold">{{$client->user->name}}</div>
                        <div class="font-normal text-gray-500">{{$client->user->email}}</div>
                    </div>
                </th>
                <td class="px-6 py-4">
                    {{$client->job}}
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center">
                        <p
                            class="bg-red-100 text-red-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">{{$client->regime_id}}</p>
                    </div>
                </td>
                <td class="px-6 py-4">
                    {{$client->annual_turnover}}€
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
           @endforeach
            

        </tbody>
    </table>
</div>
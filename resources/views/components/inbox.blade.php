@php
    $messages = [
        [
            'client' => 'Mr. Tamburino',
            'type' => 'Info',
            'read' => false,
        ],
        [
            'client' => 'Beppe Bergomi',
            'type' => 'Fattura',
            'read' => false,
        ],
        [
            'client' => 'Tonino Accolla',
            'type' => 'Info',
            'read' => true,
        ],
        [
            'client' => 'Adam Ondra',
            'type' => 'Info',
            'read' => true,
        ],
        [
            'client' => 'Osama Bin Laden',
            'type' => 'Fattura',
            'read' => true,
        ],
        [
            'client' => 'Don Federico',
            'type' => 'Fattura',
            'read' => false,
        ],
        [
            'client' => 'Gina Lollobrigida',
            'type' => 'Info',
            'read' => true,
        ],
        [
            'client' => 'Madonna Di Campiglio',
            'type' => 'Fattura',
            'read' => false,
        ],
        [
            'client' => 'Sheldon Cooper',
            'type' => 'Info',
            'read' => false,
        ],
        [
            'client' => 'Sheldon Cooper',
            'type' => 'Info',
            'read' => false,
        ],
        [
            'client' => 'Sheldon Cooper',
            'type' => 'Info',
            'read' => false,
        ],
        [
            'client' => 'Sheldon Cooper',
            'type' => 'Info',
            'read' => false,
        ],
        [
            'client' => 'Sheldon Cooper',
            'type' => 'Info',
            'read' => false,
        ],
        [
            'client' => 'Sheldon Cooper',
            'type' => 'Info',
            'read' => false,
        ],
        [
            'client' => 'Sheldon Cooper',
            'type' => 'Info',
            'read' => false,
        ],
        [
            'client' => 'Sheldon Cooper',
            'type' => 'Info',
            'read' => false,
        ],
    ];
@endphp

<div class="relative overflow-y-auto sm:rounded-lg mt-10 mb-8">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Client
                </th>
                <th scope="col" class="px-6 py-3">
                    Type
                </th>
                <th scope="col" class="px-6 py-3">
                    Read
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($messages as $message)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $message['client'] }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $message['type'] }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $message['read'] }}
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>

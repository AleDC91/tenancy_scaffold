@hasanyrole('admin|employee')
    <x-tenant-dashboard>
        <x-sidebar>
            <x-back-button />
            <h1 class="text-2xl lg:text-3xl text-center mt-6">Message</h1>

            <div class="flex items-center">
                <h4 class="text-xl my-5">Sent by: &nbsp;<span class="ms-3 font-bold">
                        @if ($message->client)
                            <a
                                href="{{ route('clients.show', ['client' => $message->client]) }}">{{ $message->client->user->name }}</a>
                        @else
                            <a href="#">Nome</a>
                        @endif
                    </span>
                </h4>
                @php
                    $class = '';
                    switch ($message->priority) {
                        case 'urgent':
                            $class =
                                'inline bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300';
                            $text = 'urgent';
                            break;
                        case 'normal':
                            $class =
                                'inline bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300';
                            $text = 'normal';
                            break;
                    }
                    echo "<p class='$class ms-8'>$text</p>";
                @endphp
            </div>
            <p class="font-normal">{{ $message->body }}</p>
            <p class="font-normal my-5">{{ $message->created_at }}</p>

        </x-sidebar>
    </x-tenant-dashboard>
@endhasanyrole

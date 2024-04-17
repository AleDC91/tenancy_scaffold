@hasanyrole('admin|employee')
    <x-tenant-dashboard>
        <x-sidebar>
            <x-back-button />
            <div class="border m-4 p-4">
                <h1 class="text-2xl text-center my-12">
                        {{ $deadline->name }}
                </h1>
                <p class="italic mb-5">{{$deadline->description}}</p>
                @php
                    if ($remainingDays == 0) {
                        echo '<p class="my-3">Due date today!</p>';
                    } else {
                        echo $isPassed
                            ? "<p class='my-3'>Expired $remainingDays days ago</p>"
                            : "<p class='my-3'>Due date in $remainingDays days</p>";
                    }
                @endphp
            <div>
                <h2 class="text-xl">Clients</h2>
                <p class="text-blue-500">metti lista di clienti iteressati da questa scadenza</p>
            </div>
            </div>
        </x-sidebar>
    </x-tenant-dashboard>
@endhasanyrole

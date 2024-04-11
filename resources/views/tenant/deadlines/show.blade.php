@hasanyrole('admin|employee')
    <x-tenant-dashboard>
        <x-sidebar>
            <x-back-button />
            <div>
                <h1 class="text-2xl text-center my-12">
                        {{ $deadline->name }}
                </h1>

                @php
                    if ($remainingDays == 0) {
                        echo '<p>Due date today!</p>';
                    } else {
                        echo $isPassed
                            ? "<p>Expired $remainingDays days ago</p>"
                            : "<p>Due date in $remainingDays days</p>";
                    }
                @endphp

            </div>
        </x-sidebar>
    </x-tenant-dashboard>
@endhasanyrole

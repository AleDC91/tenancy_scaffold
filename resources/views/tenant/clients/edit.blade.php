@hasanyrole('admin|employee')
    <x-tenant-dashboard>
        <x-sidebar>
            @if ($errors->any())
            <div class="p-4 mb-4 text-sm text-center text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <x-back-button />
            <h1 class="text-2xl lg:text-3xl text-center my-6">Edit client</h1>
            <x-edit-client :client="$client" />
        </x-sidebar>
    </x-tenant-dashboard>
@endhasanyrole

@hasanyrole('admin|employee')
    <x-tenant-dashboard>
        <x-sidebar>
            <x-back-button />
            <div class="">
                @if ($errors->any())
                <div class="p-4 mb-4 text-sm text-center text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h1 class="text-2xl text-center my-12">Add a new Employee</h1>
                <x-edit-employee :employee="$employee"/>
            </div>
        </x-sidebar>
    </x-tenant-dashboard>
@endhasanyrole

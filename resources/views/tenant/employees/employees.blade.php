@hasanyrole('admin|employee')
    <x-tenant-dashboard>
        <x-sidebar>
            <x-back-button />
            {{-- <div class="h-5"></div> --}}
            <a role="button" href={{route('employees.create')}} type="button" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 float-end">
                Add New Employee
            </a>
            <h1 class="text-2xl lg:text-3xl text-center my-6">Employees</h1>
            <x-employees-table />
        </x-sidebar>
    </x-tenant-dashboard>
@endhasanyrole
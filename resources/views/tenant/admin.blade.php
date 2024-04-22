<x-tenant-dashboard>
    <x-sidebar>
        <x-back-button />
        {{-- <div class="h-5"></div> --}}

        <h2 class="text-3xl my-5">Clients
            <a role="button" href={{ route('clients.create') }} type="button"
                class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 float-end">
                Add New Client
            </a>
        </h2>
        <div class="h-80 overflow-auto mb-10">
            <x-clients-table />
        </div>
        <h2 class="text-3xl mt-20 mb-5">Employees
            <a role="button" href={{ route('employees.create') }} type="button"
            class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 float-end">
            Add New Employee
        </a>
        </h2>
        <div class="h-80 overflow-auto mb-10">
            <x-employees-table />
        </div>
        <h2 class="text-3xl mt-20 mb-5">Categories
            <a role="button" href={{ route('categories.create') }} type="button"
            class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 float-end">
            Add New Category
        </a>
        </h2>
        <div class="h-80 overflow-auto mb-10">
            <x-categories />
        </div>
    </x-sidebar>
</x-tenant-dashboard>

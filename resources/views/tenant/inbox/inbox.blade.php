@hasanyrole('admin|employee')
    <x-tenant-dashboard>
        <x-sidebar>
            <x-back-button />
            <h1 class="text-2xl lg:text-3xl text-center mt-6">Messages<span class="float-end">
                
            </span></h1>
            <x-messages-table />
        </x-sidebar>
    </x-tenant-dashboard>
@endhasanyrole

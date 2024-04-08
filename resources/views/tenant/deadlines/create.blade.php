@hasanyrole('admin|employee')
    <x-tenant-dashboard>
        <x-sidebar>
            <x-back-button />
            <div class="">
                <h1 class="text-2xl text-center my-12">Add a new Deadline</h1>
                <x-create-deadline />
            </div>
        </x-sidebar>
    </x-tenant-dashboard>
@endhasanyrole

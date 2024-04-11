@hasanyrole('admin|employee')
    <x-tenant-dashboard>
        <x-sidebar>
            <x-back-button />
            <div class="">
                <h1 class="text-2xl text-center my-12">Edit Deadline</h1>
                {{-- {{dd($deadline)}} --}}
                <x-edit-deadline :deadline="$deadline"/>
            </div>
        </x-sidebar>
    </x-tenant-dashboard>
@endhasanyrole

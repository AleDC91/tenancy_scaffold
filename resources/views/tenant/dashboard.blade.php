@role('admin')
    <x-tenant-dashboard>
        <x-sidebar>
            <x-tenantDashboard.admin />
        </x-sidebar>
    </x-tenant-dashboard>
@endrole

@role('employee')
    <x-tenant-dashboard>
        <x-sidebar>
            <x-tenantDashboard.employee />
        </x-sidebar>
    </x-tenant-dashboard>
@endrole

@role('client')
    <x-tenant-layout>
        <x-tenantDashboard.client />
    </x-tenant-layout>
@endrole

<x-tenant-layout>

    @role('admin')
    Welcome Admin
    <x-tenantDashboard.admin />
    @endrole

    @role('employee')
    Welcome Employee
    <x-tenantDashboard.employee />
    @endrole

    @role('client')
    Welcome Client
    <x-tenantDashboard.client />
    @endrole


</x-tenant-layout>

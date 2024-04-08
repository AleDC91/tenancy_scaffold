<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class TenantPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'create_deadlines']);
        Permission::create(['name' => 'create_clients']);

        $admin = Role::findByName('admin');
        $admin->givePermissionTo('create_deadlines', 'create_clients');
    }
}

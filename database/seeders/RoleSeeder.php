<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin=Role::create(['name'=>'Admin']);
        $consultor=Role::create(['name'=>'Consultor']);
        Permission::create(['name'=>'admin.home'])->syncRoles(['admin', 'consultor']);
        Permission::create(['name'=>'user.home']);
       Permission::create(['name'=>'empresa']);

    }
}

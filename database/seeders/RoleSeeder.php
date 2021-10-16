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
        Permission::create(['name'=>'admin.home','description'=>'administracion ventana principal'])->syncRoles(['Admin', 'Consultor']);
        Permission::create(['name'=>'user.home','description'=>'administracion de usuarios'])->syncRoles(['Admin']);
        Permission::create(['name'=>'empresa','description'=>'registrar y administrar empresas'])->syncRoles(['Admin']);
       /* Permission::create(['name'=>'admin.roles.create','description'=>'registrar y administrar empresas']);
        Permission::create(['name'=>'admin.roles.destroy','description'=>'registrar y administrar empresas']);
        Permission::create(['name'=>'admin.roles.destroy','description'=>'registrar y administrar empresas']);
        Permission::create(['name'=>'admin.roles.update','description'=>'registrar y administrar empresas']);
        Permission::create(['name'=>'admin.roles.show ','description'=>'registrar y administrar empresas']);*/
        Permission::create(['name'=>'admin.roles','description'=>'registrar y administrar roles'])->syncRoles(['Admin']);



    }
}

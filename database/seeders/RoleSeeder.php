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
        Role::create(['name'=>'Admin']);
        Role::create(['name'=>'Consultor']);
        Role::create(['name'=>'Estudiante']);
        Permission::create(['name'=>'admin.home','description'=>'administracion ventana principal'])->syncRoles(['Admin', 'Consultor']);
        Permission::create(['name'=>'user.home','description'=>'pagina principal anuncios'])->syncRoles(['Admin','Consultor','Estudiante']);
        Permission::create(['name'=>'empresa','description'=>'registrar y administrar empresas'])->syncRoles(['Admin']);
        Permission::create(['name'=>'user.password.edit','description'=>'Editar contraseña de usuario'])->syncRoles(['Admin','Consultor']);
       /* Permission::create(['name'=>'admin.roles.create','description'=>'registrar y administrar empresas']);
        Permission::create(['name'=>'admin.roles.destroy','description'=>'registrar y administrar empresas']);
        Permission::create(['name'=>'admin.roles.destroy','description'=>'registrar y administrar empresas']);
        Permission::create(['name'=>'admin.roles.update','description'=>'registrar y administrar empresas']);
        Permission::create(['name'=>'admin.roles.show ','description'=>'registrar y administrar empresas']);*/
        Permission::create(['name'=>'admin.roles','description'=>'registrar y administrar roles'])->syncRoles(['Admin']);

        Permission::create(['name'=>'anuncio.index.','description'=>'ver anuncios publicados'])->syncRoles(['Consultor']);
        Permission::create(['name'=>'anuncio.create','description'=>'crear anuncios'])->syncRoles(['Consultor']);



    }
}

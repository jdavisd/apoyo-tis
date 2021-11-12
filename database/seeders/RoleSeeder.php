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
        $name1=Role::create(['name'=>'Admin']);
        $name2= Role::create(['name'=>'Consultor']);
        $name3=Role::create(['name'=>'Estudiante']);
        $name3=Role::create(['name'=>'Postulante']);
        Permission::create(['name'=>'admin.home','description'=>'administracion ventana principal'])->syncRoles(['Admin']);
        Permission::create(['name'=>'user.home','description'=>'pagina principal anuncios'])->syncRoles(['Admin','Consultor','Estudiante']);
        Permission::create(['name'=>'empresa','description'=>'registrar y administrar empresas'])->syncRoles(['Admin']);
        Permission::create(['name'=>'user.password.edit','description'=>'Editar contraseña de usuario'])->syncRoles(['Admin','Consultor']);
       /* Permission::create(['name'=>'admin.roles.create','description'=>'registrar y administrar empresas']);
        Permission::create(['name'=>'admin.roles.destroy','description'=>'registrar y administrar empresas']);
        Permission::create(['name'=>'admin.roles.destroy','description'=>'registrar y administrar empresas']);
        Permission::create(['name'=>'admin.roles.update','description'=>'registrar y administrar empresas']);
        Permission::create(['name'=>'admin.roles.show ','description'=>'registrar y administrar empresas']);*/
        Permission::create(['name'=>'admin.roles','description'=>'registrar y administrar roles'])->syncRoles(['Admin']);
        Permission::create(['name'=>'admin.users','description'=>'ver usuarios registrados y agregar nuevos'])->syncRoles(['Admin']);
        Permission::create(['name'=>'admin.import.users','description'=>'registrar a varios usuarios'])->syncRoles(['Admin']);
        Permission::create(['name'=>'anuncio.create','description'=>'crear anuncios'])->syncRoles(['Consultor']);
        Permission::create(['name'=>'anuncio.edit','description'=>'editar anuncios publicados'])->syncRoles(['Consultor']);
        Permission::create(['name'=>'anuncio.destroy','description'=>'eliminar anuncios publicados'])->syncRoles(['Consultor']);
        Permission::create(['name'=>'anuncio.document','description'=>'ver documento de anuncios publicados'])->syncRoles(['Consultor','Admin','Estudiante']);

        Permission::create(['name'=>'user.notificar','description'=>'notificar a un usuario registrado'])->syncRoles(['Admin']);
    }                                  
}

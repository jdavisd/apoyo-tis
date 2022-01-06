<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       //$roles=Role::all();
        $roles=Role::all()->whereNotIn('name',['Postulante','Admin']);
        
        return view('admin.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions=Permission::all();
        return view('admin.roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['regex:/^[a-zA-Z]+$/u','required','unique:roles,name'],
            'permissions' => 'required|min:1'
        ]);

        $role=Role::create($request->all());
        $role->permissions()->sync( $request->permissions);
        //return redirect()->route('admin.roles.index',$role)->with('info','Se creo el rol');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('admin.roles.show',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions=Permission::all();
        return view('admin.roles.edit',compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $role)
    {
        $request->validate([
            'permissions' => 'required|min:1'
          ]);
          //$role=Role::create($request->all());
          $roles1=Role::find($role);
          $roles1->syncPermissions( $request->permissions);
         // $role->permissions()->sync( $request->permissions);
          return redirect()->route('admin.roles.index')->with('info','Rol actualizado correctamente');
          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index')->with('info','Rol eliminado correctamente');
    }
}

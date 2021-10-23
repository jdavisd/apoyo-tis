<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{

    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $user=User::find($id);
       // return view ('users2',compact('user'));
       return view('users',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8' ],
            'password_confirmation' => ['required', 'string', 'min:8'],
        ]);
if($request->password==$request->password_confirmation){
    $user=User::find($user);
    $user->password=Hash::make($request->password); 
    $user->save();
    return back()->with('message-sucess','Se actualizo su contraseña');
  // return "error";
}

return back()->with('message-fail','contraseña no coincide');
//return $user;
}
        


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

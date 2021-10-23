<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function edit($user){
        return view('users.edit',compact('user'));
    }

    public function update(Request $request, $user){
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::find($user);
        $user->password = Hash::make($request->password);
        $user->save();
        Auth::logout();
        return redirect('login');
    }
}

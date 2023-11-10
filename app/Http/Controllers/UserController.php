<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = null;
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        User::create($request->all());

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles_seleccionados = User::find($user->id)->roles()->pluck('id')->toArray();

        $roles = Role::all();
        return view('users.edit',compact('user','roles','roles_seleccionados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, User $user)
    {
        if($request->filled('old_password')){

            if(!Hash::check($request->old_password, auth()->user()->password)){
                return back()->with('mensaje','Contraseña incorrecta. Por favor, inténtalo de nuevo.');
            }

            $request->validate([
                'password'=> 'min:8|confirmed',
            ]);
        }

        $user->roles()->sync($request->roles);
        $user->update($request->all());

        return redirect()->route('users.index')->with('updated','Usuario actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success','ok');
    }
}

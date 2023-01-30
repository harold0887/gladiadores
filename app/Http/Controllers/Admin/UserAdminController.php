<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Contracts\Role;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;

class UserAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = DB::table('roles')
            ->whereNotIn('name', ['propietario', 'super-admin'])->get();


        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $model)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'nickname' => ['required', 'string', 'max:255'],
            'phone' => 'required|regex:/^[0-9]{10}$/|unique:users,phone',
            //'rol_id' => 'required|regex:/^[1-2]{1}$/'
        ]);

        try {

            $randString = Str::random(10);
            $user =  User::create([
                'name' => request('name'),
                'nickname' => request('nickname'),
                'email' => request('email'),
                'phone' => request('phone'),
                'picture' => $request->photo ? $request->photo->store('profile', 'public') : null,
                'password' => Hash::make($randString),
                'created_by' => auth()->user()->name,

            ]);

            $user->assignRole('usuario');

            //pendiente notificar al usuario

            return back()->with('success', 'El usuario fue creado con exito');
        } catch (\Throwable $e) {
            return back()->with('error', 'Error al crear usuario - ' . $e->getMessage());
        }
    }

 


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'nickname' => ['required', 'string', 'max:255'],
            'phone' => 'required|regex:/^[0-9]{10}$/',
        ]);

        $user = User::findOrFail($id);


        try {
            $user->update([
                'name' => request('name'),
                'nickname' => request('nickname'),
                'email' => request('email'),
                'picture' => request()->photo ? request()->photo->store('profile', 'public') : $user->picture,
                'phone' => request('phone'),
            ]);
            return back()->with('success', 'El usuario se actualizó de manera correcta');
        } catch (\Throwable $e) {
            return back()->with('error', 'Error al actualizar el usuario - ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->id == $id) {
            return back()->with('error', 'No puedes eliminar tu propio usuario');
        }

        try {
            $user = User::findOrFail($id);
            $user->destroy($id);
            if ($user->picture) {
                Storage::delete($user->picture);
            }


            return back()->with('success', 'El usuario se eliminó de manera correcta');
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                $messageError = 'Una o mas membresias pertenecen a esta usario.';
            } else {
                $messageError = $e->getMessage();
            }
            return back()->with('error', 'Error al eliminar el usuario - ' . $messageError);
        }
    }
}

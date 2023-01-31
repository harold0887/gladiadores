<?php

namespace App\Http\Controllers\Admin;

use App\Frase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;

class ProfileAdminController extends Controller
{
    public function edit()
    {
        $frase = Frase::orderByRaw("RAND()")->limit(1)
        
       ->pluck("frase");

   
//dd($frase);
        return view('profile.admin-profile', compact('frase'));
    }


    //actualizar foto de perfil
    public function update(ProfileRequest $request)
    {

        auth()->user()->update(
            $request->merge(['picture' => $request->photo ? $request->photo->store('profile', 'public') : null])
                ->except([$request->hasFile('photo') ? '' : 'picture'])
        );

        return back()->with('success', "Perfil actualizado con éxito.");
    }

    //actualizar contraseña
    public function password(PasswordRequest $request)
    {


        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->with('success', "Contraseña actualizada con éxito");

    }
}

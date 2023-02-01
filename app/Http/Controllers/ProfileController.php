<?php

namespace App\Http\Controllers;

use Gate;
use App\User;
use App\Frase;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = User::findOrFail(auth()->user()->id);

    
        $membresias =  $user ->orders()->orderBy('fin', 'desc')->get();
        $membresiasActive = $user->orders()->where('status_id',2);
        $frase = Frase::orderByRaw("RAND()")
        ->limit(1)
       ->pluck("frase");
        return view('profile.user-profile', compact('frase','membresias','membresiasActive'));
    }


    //actualizar foto de perfil
    public function update(ProfileRequest $request)
    {

        auth()->user()->update(
            $request->merge(['picture' => $request->photo ? $request->photo->store('profile', 'public') : null])
                ->except([$request->hasFile('photo') ? '' : 'picture'])
        );

        return back()->with('success', "Perfil actualizado con éxito");
    }

    //actualizar contraseña
    public function password(PasswordRequest $request)
    {


        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->with('success', "Contraseña actualizada con éxito");

    }
}

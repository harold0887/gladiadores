<?php

namespace App\Http\Controllers;

use Gate;
use App\User;
use App\Frase;
use App\Order;
use App\Membresia;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Request;


class ProfileController extends Controller
{
    public function profile()
    {
        $user = User::findOrFail(auth()->user()->id);


        $membresias =  $user->orders()->orderBy('fin', 'desc')
            ->whereNotIn('membresia_id', [1])->get();
        $membresiasActive = $user->orders()
            ->whereNotIn('membresia_id', [1])
            ->where('status_id', 2);
        $frase = Frase::orderByRaw("RAND()")
            ->limit(1)
            ->pluck("frase");
        return view('profile.user-profile', compact('frase', 'membresias', 'membresiasActive'));
    }


    //actualizar foto de perfil
    public function update(ProfileRequest $request)
    {
        try {
            auth()->user()->update(
                $request->merge(['picture' => $request->photo ? $request->photo->store('profile', 'public') : null])
                    ->except([$request->hasFile('photo') ? '' : 'picture', 'name'])
            );

            return back()->with('success', "Perfil actualizado con éxitosss");
        } catch (\Throwable $th) {
            return back()->with('error', "Error al actualizar los datos: " . $th->getMessage());
        }
    }

    //actualizar contraseña
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->with('success', "Contraseña actualizada con éxito");
    }


    public function subscriptions()
    {
        $user = User::findOrFail(auth()->user()->id);
        $membresias =  $user->orders()->orderBy('created_at', 'desc')->get();
        $membresiasActive =  $user->orders
            ->whereNotIn('membresia_id', [1])
            ->where('status_id', 2);
        return view('profile.subscriptions', compact('user', 'membresias', 'membresiasActive'));
    }


   

    public function adSubscriptions(Request $request)
    {

   
        $membresia = Membresia::findOrFail(request('id'));



        $active = Order::where('user_id', auth()->user()->id)
            ->where('status_id', 2)
            ->whereNotIn('membresia_id', [1])
            ->count();



        if ($active >= 1) {
            return back()->with('error', 'No puede inscribirse a esta membresia, tiene una suscripción activa. Contactar al administrador.');
            
        } else {

            $date = new Carbon(now());
            $end = new Carbon(now());

            switch ($membresia->frecuencia->id) {
                case '1':
                    $end->addYear()->subDay();
                    break;
                case '2':
                    $end->addMonth(6)->subDay();
                    break;
                case '3':
                    $end->addMonth(3)->subDay();
                    break;
                case '4':
                    $end->addMonth()->subDay();
                    break;
            }

            try {
                Order::create([
                    'membresia_id' => $membresia->id,
                    'amount' => $membresia->price_with_discount,
                    'description' => 'Membresia  creada por' . auth()->user()->name,
                    'created_by' => auth()->user()->name,
                    'user_id' => auth()->user()->id,
                    'status_id' => 1,
                    'inicio' => $date,
                    'fin' => $end,
                ]);

               
                return back()->with('success', 'Inscripción realizada con éxito, puede pagar desde "Mis Suscripciones"' );

        
            } catch (\Throwable $th) {


                return back()->with('error', 'Error al realizar la inscripción - ' . $th->getMessage(), );
             
            }
        }
    }
}

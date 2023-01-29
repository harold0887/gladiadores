<?php

namespace App\Http\Controllers\Admin;

use App\Membresia;
use App\Frecuencia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.membership.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $frecuencias = Frecuencia::all();
        return view('admin.membership.create', compact('frecuencias'));
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
            'name' => ['required', 'string', 'max:255', 'unique:membresias,name'],
            'price' => ['required', 'integer',],
            'frecuencia_id' => ['required', 'integer'],
            'discount' => 'required', 'integer'

        ]);
        $price = number_format((float)request('price'), 2, '.', '');
        $descuento = request('discount');
        $price_with_discount = $price - $descuento;

        if ($price_with_discount < 0) {
            return back()->with('error', 'El descuento no puede ser mayor que el precio.');
        }

        try {
            Membresia::create([
                'name' => request('name'),
                'frecuencia_id' => request('frecuencia_id'),
                'price' => $price,
                'discount' => request('discount'),
                'price_with_discount' => $price_with_discount,
                //'description' => '',
                'status' => 0,
                'main' => 0
            ]);
            return back()->with('success', 'Registro exitoso');
        } catch (\Throwable $th) {

            return back()->with('error', 'Error al guardar el registro - ' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $membresia = Membresia::findOrFail($id);
        $frecuencias = Frecuencia::all();
        return view('admin.membership.edit', compact('membresia', 'frecuencias'));
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
        $membresia = Membresia::findOrFail($id);


        $price = number_format((float)request('price'), 2, '.', '');
        $descuento = request('discount');
        $price_with_discount = $price - $descuento;

        if ($price_with_discount < 0) {
            return back()->with('error', 'El descuento no puede ser mayor que el precio.');
        }


        if ($membresia->id == 1 || $membresia->id == 2 || $membresia->id == 3 || $membresia->id == 4) {
            $request->validate([
                'price' => ['required', 'integer',],
                'discount' => 'required', 'integer'

            ]);

            try {
                $membresia->update([
                    'price' => $price,
                    'discount' => request('discount'),
                    'price_with_discount' => $price_with_discount,
                ]);
                return back()->with('success', 'La membresía se actualizó de manera correcta');
            } catch (\Throwable $e) {
                return back()->with('error', 'Error al actualizar la membresía - ' . $e->getMessage());
            }
        } else {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'price' => ['required', 'integer',],
                'frecuencia_id' => ['required', 'integer'],
                'discount' => 'required', 'integer'
            ]);

            try {
                $membresia->update([
                    'name' => request('name'),
                    'frecuencia_id' => request('frecuencia_id'),
                    'price' => $price,
                    'discount' => request('discount'),
                    'price_with_discount' => $price_with_discount,
                ]);
                return back()->with('success', 'La membresía se actualizó de manera correcta');
            } catch (\Throwable $e) {
                return back()->with('error', 'Error al actualizar la membresía - ' . $e->getMessage());
            }
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
        $membresia = Membresia::findOrFail($id);

        if ($membresia->id == 1 || $membresia->id == 2 || $membresia->id == 3 || $membresia->id == 4) {
            return back()->with('error', 'Esta membresía no se puede eliminar, se recomienda cambiar el status.');
        }


        try {

            $membresia->destroy($id);



            return back()->with('success', 'La membresia se eliminó de manera correcta');
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                $messageError = 'Uno o mas usuarios pertenecen a esta membresía.';
            } else {
                $messageError = $e->getMessage();
            }
            return back()->with('error', 'Error al eliminar la mebresia - ' . $messageError);
        }
    }
}

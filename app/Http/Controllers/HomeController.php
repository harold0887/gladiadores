<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\Comment;
use App\Membresia;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('home', compact('comments'));
    }

    public function dashboard()
    {
        $users = User::all();
        $active = Order::where('status_id', 2)
            ->whereNotIn('membresia_id', [1])->get();
 


        //consulta los proximos dentro de 10 dias vencimientos sin ser inscripciones y solo ordenes activas
        $proximos = Order::where(function ($query) {
            $query
                ->where('status_id', 2)
                ->whereNotIn('membresia_id', [1])
                ->whereBetween('fin', [Carbon::create(now()), Carbon::create(now())->addDays(10)]);
        })->get();



        return view('dashboard', compact('users', 'active', 'proximos'));
    }

    public function membresias()
    {
        $memberships = Membresia::where('status', 1)->get();

        //return $memberships;   
        return view('membresias', compact('memberships'));
    }

    public function contacto()
    {



        return view('contacto');
    }
}

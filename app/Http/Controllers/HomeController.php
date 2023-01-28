<?php

namespace App\Http\Controllers;

use App\Membresia;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function membresias()
    {
        $memberships = Membresia::where('status', 1)->get();

        //return $membresias;
        return view('membresias',compact('memberships'));
    }

 
}

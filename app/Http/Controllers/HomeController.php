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
        $comments = Comment::where('best', 1)
            ->where('status', 1)->get();


        return view('home', compact('comments'));
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    // public function membresias()
    // {
    //     $memberships = Membresia::where('status', 1)->get();

    //     //return $memberships;   
    //     return view('membresias', compact('memberships'));
    // }

    public function contacto()
    {
        return view('contacto');
    }
}

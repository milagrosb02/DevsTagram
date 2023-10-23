<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{

    // Protego el muro con middleware
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        // retorna la vista del muro
        return view('dashboard');
    }
}

<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{

    public function index()
    {
        return view('home.index');
    }

//    /**
//     * Create a new controller instance.
//     *
//     * @return void
//     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
}

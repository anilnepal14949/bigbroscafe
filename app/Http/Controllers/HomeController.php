<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->is_admin == 1) {
            return redirect()->to('/backend');
        } else {
            return redirect()->to('/');
        }
    }

    public function frontend()
    {
        return view('home');
    }
}

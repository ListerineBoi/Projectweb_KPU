<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublikController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function homepub()
    {
        return view('/layouts/Publik/homePublik');
    }

    public function smpub()
    {
        return view('/layouts/Publik/SMPublik');
    }

    public function tps()
    {
        return view('/layouts/Publik/tps');
    }

    public function tcp()
    {
        return view('/layouts/Publik/TCP');
    }
}

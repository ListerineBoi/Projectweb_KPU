<?php
   
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index1()
    {
        return view('/layouts/Admin/SuratMasuk');
    }

    public function index2()
    {
        return view('/layouts/Admin/SuratKeluar');
    }

    public function ism()
    {
        return view('/layouts/Admin/InputSM');
    }

    public function tpsadm()
    {
        return view('/layouts/Admin/tpsadmin');
    }
}

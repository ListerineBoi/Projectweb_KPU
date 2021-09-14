<?php
   
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratM;
use Auth;

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
        $list=SuratM::where('penerima','=',null)->get();
        return view('/layouts/Admin/SuratMasuk',compact('list'));
    }
    public function verif(Request $request)
    {
        $id=Auth::user()->id;
        if($request->get('type')=="0"){
            SuratM::where('id', $request->get('id'))->update(['penerima' => $id , 'tps_jog' => "1"]);
        }else{
            SuratM::where('id', $request->get('id'))->delete();
        
        }
        return redirect()->route('SuratMasuk');
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

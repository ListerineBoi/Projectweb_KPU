<?php
   
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratM;
use App\Models\SuratK;
use App\Models\Tps;
use App\Models\Kecamatan;
use Auth;

class AdminController extends Controller
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
        $lok=Auth::user()->lokasi;
        $tps=Tps::all();
        $list=SuratM::where([
            ['penerima','=',null],
            ['kec_jog','=',$lok]
        ])->get();
        return view('/layouts/Admin/SuratMasuk',compact('list'));
    }
    public function verif(Request $request)
    {
        $id=Auth::user()->id;
        if($request->get('type')=="0"){
            SuratM::where('id', $request->get('id'))->update(['penerima' => $id , 'tps_jog' => $request->get('tps_jog')]);
        }else{
            SuratM::where('id', $request->get('id'))->delete();
        
        }
        return redirect()->route('SuratMasuk');
    }

    public function index2()
    {
        $lok=Auth::user()->lokasi;
        $tps=Tps::all();
        $list=SuratK::where([
            ['penerima','=',null],
            ['kec_jog','=',$lok]
        ])->get();
        return view('/layouts/Admin/SuratKeluar',compact('list'));
    }

    public function verifK(Request $request)
    {
        $id=Auth::user()->id;
        if($request->get('type')=="0"){
            SuratK::where('id', $request->get('id'))->update(['penerima' => $id]);
        }else{
            SuratK::where('id', $request->get('id'))->delete();
        
        }
        return redirect()->route('SuratKeluar');
    }


    public function ism()
    {
        $tps=Tps::all();
        $kec=Kecamatan::all();
        return view('/layouts/Admin/InputSM');
    }

    public function saveIsm()
    {
        $this->validate($request, [
            'tps_jog' => 'required',
            'penerima' => 'required',
            'kecamatan_jog' => 'required',
            'nokk' => 'required',
            'nik' => 'required',
            'nama' => 'required',
            'provinsi' => 'required',
            'kabukot' => 'required',
            'kecamatan' => 'required',
            'keldes' => 'required',
            'disabil' => 'required',
            'alasan' => 'required',
            'keldes_jog' => 'required',
            'email' => 'required',
            'nohp' => 'required',
            'img_c1' => 'required',
            'img_ktp' => 'required'      
        ]);
            $fullname = $request->file('img_c1')->getClientOriginalName();
            $extn =$request->file('img_c1')->getClientOriginalExtension();
            $finalc1= $request->nik.'_'.'C1'.'_'.time().'.'.$extn;


            $fullname = $request->file('img_ktp')->getClientOriginalName();
            $extn =$request->file('img_ktp')->getClientOriginalExtension();
            $finalktp= $request->nik.'_'.'KTP'.'_'.time().'.'.$extn;

            //$path = $request->file('img')->storeAs('public/homestay', $final);

        $SuratM= new SuratM([
            'tps_jog' => $request->tps_jog,
            'penerima' => $request->penerima,
            'kec_jog' => $request->kecamatan_jog,
            'no_kk' => $request->nokk,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'prov' => $request->provinsi,
            'kab' => $request->kabukot,
            'kec' => $request->kecamatan,
            'kel' => $request->keldes,
            'tps' => $request->tps,
            'dis' => $request->disabil,
            'alasan' => $request->alasan,
            'kec_jog' => $request->kecamatan_jog,
            'kel_jog' => $request->keldes_jog,
            'email' => $request->email,
            'No_hp' => $request->nohp,
            'img_c1' => $finalc1,
            'img_c1' => $finalktp
            
        ]);
        $SuratM->save();
        return redirect()->route('InputSM');
    }

    public function isk()
    {
        $tps=Tps::all();
        $kec=Kecamatan::all();
        return view('/layouts/Admin/InputSK');
    }

    public function saveIsk()
    {
        $this->validate($request, [
            'tps_jog' => 'required',
            'penerima' => 'required',
            'kecamatan_jog' => 'required',
            'nokk' => 'required',
            'nik' => 'required',
            'nama' => 'required',
            'provinsi' => 'required',
            'kabukot' => 'required',
            'kecamatan' => 'required',
            'disabil' => 'required',
            'alasan' => 'required',
            'keldes_jog' => 'required',
            'email' => 'required',
            'nohp' => 'required',
            'img_c1' => 'required',
            'img_ktp' => 'required'      
        ]);
            $fullname = $request->file('img_c1')->getClientOriginalName();
            $extn =$request->file('img_c1')->getClientOriginalExtension();
            $finalc1= $request->nik.'_'.'C1'.'_'.time().'.'.$extn;


            $fullname = $request->file('img_ktp')->getClientOriginalName();
            $extn =$request->file('img_ktp')->getClientOriginalExtension();
            $finalktp= $request->nik.'_'.'KTP'.'_'.time().'.'.$extn;

            //$path = $request->file('img')->storeAs('public/homestay', $final);

        $SuratK= new SuratK([
            'tps_jog' => $request->tps_jog,
            'penerima' => $request->penerima,
            'kec_jog' => $request->kecamatan_jog,
            'no_kk' => $request->nokk,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'prov' => $request->provinsi,
            'kab' => $request->kabukot,
            'kec' => $request->kecamatan,
            'dis' => $request->disabil,
            'alasan' => $request->alasan,
            'kel_jog' => $request->keldes_jog,
            'email' => $request->email,
            'No_hp' => $request->nohp,
            'img_c1' => $finalc1,
            'img_c1' => $finalktp
            
        ]);
        $SuratK->save();
        return redirect()->route('InputSK');
    }

    public function tpsadm()
    {
        $tps=Tps::all();
        return view('/layouts/Admin/tpsadmin');
    }

    public function profiladm()
    {
        return view('/layouts/Admin/ProfilAdm');
    }

    public function setting()
    {
        return view('/layouts/Admin/Setting');
    }

    public function detailSM()
    {
        return view('/layouts/Admin/DetailSM');
    }

    public function detailSK()
    {
        return view('/layouts/Admin/DetailSK');
    }
}

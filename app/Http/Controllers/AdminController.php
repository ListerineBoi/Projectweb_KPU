<?php
   
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratM;
use App\Models\SuratK;
use App\Models\Tps;
use App\Models\Kecamatan;
use App\Models\KabKot;
use App\Models\Keldes;
use App\Models\Prov;
use App\Mail\Diterima;
use App\Mail\Ditolak;
use Illuminate\Support\Facades\Mail;
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
        $role=Auth::user()->role;
        $tps=Tps::all();
        if($role==1){
            $list=SuratM::where([
                ['status','=',0]
            ])->get();

            }else{
                if(strlen($lok)==7){
                    $list=SuratM::where([
                        ['status','=',0],
                        ['kec_jog','=',$lok]
                    ])->get();
                }elseif(strlen($lok)==10) {
                    $list=SuratM::where([
                        ['status','=',0],
                        ['kel_jog','=',$lok]
                    ])->get();
                }
        }
        return view('/layouts/Admin/SuratMasuk',compact('list','tps'));
    }
    public function verif(Request $request)
    {
        $id=Auth::user()->id;
        if($request->get('type')=="0"){
            $this->validate($request, [
                'tps_jog' => 'required'
                     
            ]);
            SuratM::where('id', $request->get('id'))->update(['status' => 1 ,'penerima' => $id , 'tps_jog' => $request->get('tps_jog')]);
            Tps::where('id', $request->get('tps_jog'))->increment('jml_p_pilih');
            
           Mail::to(SuratM::where('id', $request->get('id'))->value('email'))->send(new Diterima());
           
        }else{
            SuratM::where('id', $request->get('id'))->update(['status' => 2 ,'penerima' => $id]);
            Mail::to(SuratM::where('id', $request->get('id'))->value('email'))->send(new Ditolak());
            
        }
        return redirect()->route('SuratMasuk');
    }

    public function index2()
    {
        $lok=Auth::user()->lokasi;
        $tps=Tps::all();
        if($lok==null){
            $list=SuratK::where([
                ['status','=',0]
            ])->get();

            }else{
                if(strlen($lok)==7){
                    $list=SuratK::where([
                        ['status','=',0],
                        ['kec_jog','=',$lok]
                    ])->get();
                    }elseif(strlen($lok)==10) {
                        $list=SuratK::where([
                            ['status','=',0],
                            ['kel_jog','=',$lok]
                        ])->get();
                    }
        }
        return view('/layouts/Admin/SuratKeluar',compact('list'));
    }

    public function verifK(Request $request)
    {
        $id=Auth::user()->id;
        
        if($request->get('type')=="0"){
            SuratK::where('id', $request->get('id'))->update(['status' => 1 ,'penerima' => $id]);
            $tps=SuratK::where('id', $request->get('id'))->value('tps_jog');
            Tps::where('id', $tps)->decrement('jml_p_pilih');
            Mail::to(SuratK::where('id', $request->get('id'))->value('email'))->send(new Diterima());
        }else{
            SuratK::where('id', $request->get('id'))->update(['status' => 2 ]);
            Mail::to(SuratK::where('id', $request->get('id'))->value('email'))->send(new Ditolak());
        }
        return redirect()->route('SuratKeluar');
    }


    public function ism()
    {
        $prov=Prov::all();
        $kec=Kecamatan::where('kabkot','=', 3471)->get();
        return view('/layouts/Admin/InputSM',compact('prov','kec'));
    }

    public function saveIsm(Request $request)
    {
        $id=Auth::user()->id;
        $this->validate($request, [
            'tps_jog' => 'required',
            'kec_jog' => 'required',
            'nokk' => 'required',
            'nik' => 'required',
            'nama' => 'required',
            'provinsi' => 'required',
            'kabukot' => 'required',
            'kecamatan' => 'required',
            'kel' => 'required',
            'disabil' => 'required',
            'alasan' => 'required',
            'kel_jog' => 'required',
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
            'status' => 1,
            'tps_jog' => $request->tps_jog,
            'penerima' => $id,
            'kec_jog' => $request->kecamatan_jog,
            'no_kk' => $request->nokk,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'prov' => $request->provinsi,
            'kab' => $request->kabukot,
            'kec' => $request->kecamatan,
            'kel' => $request->kecamatan,
            'dis' => $request->disabil,
            'alasan' => $request->alasan,
            'kec_jog' => $request->kec_jog,
            'kel_jog' => $request->kel_jog,
            'email' => $request->email,
            'No_hp' => $request->nohp,
            'img_c1' => $finalc1,
            'img_ktp' => $finalktp
            
        ]);
        $SuratM->save();
        Tps::where('id', $request->get('tps_jog'))->increment('jml_p_pilih');
        return redirect()->route('InputSM');
    }

    public function isk()
    {
        $prov=Prov::all();
        $kec=Kecamatan::where('kabkot','=', 3471)->get();
        return view('/layouts/Admin/InputSK',compact('prov','kec'));
    }

    public function saveIsk(Request $request)
    {
        $id=Auth::user()->id;
        $this->validate($request, [
            'tps_jog' => 'required',
            'kec_jog' => 'required',
            'nokk' => 'required',
            'nik' => 'required',
            'nama' => 'required',
            'provinsi' => 'required',
            'kabukot' => 'required',
            'kecamatan' => 'required',
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
            'status' => 1,
            'tps_jog' => $request->tps_jog,
            'penerima' => $id,
            'kec_jog' => $request->kec_jog,
            'no_kk' => $request->nokk,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'prov' => $request->provinsi,
            'kab' => $request->kabukot,
            'kec' => $request->kecamatan,
            'kel_jog' => $request->kel_jog,
            'email' => $request->email,
            'No_hp' => $request->nohp,
            'img_c1' => $finalc1,
            'img_ktp' => $finalktp
            
        ]);
        $SuratK->save();
        Tps::where('id', $request->get('tps_jog'))->decrement('jml_p_pilih');
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

    public function inputTPS()
    {
        return view('/layouts/Admin/InputTPS');
    }
}

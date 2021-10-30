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
            Tps::where('id', $request->get('tps_jog'))->increment('jml_masuk');
            
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
            Tps::where('id', $tps)->increment('jml_keluar');
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
        // $this->validate($request, [
        //     'tps_jog' => 'required',
        //     'kec_jog' => 'required',
        //     'nokk' => 'required',
        //     'nik' => 'required',
        //     'nama' => 'required',
        //     'jk' => 'required',
        //     'provinsi' => 'required',
        //     'kabukot' => 'required',
        //     'kecamatan' => 'required',
        //     'kel' => 'required',
        //     'disabil' => 'required',
        //     'alasan' => 'required',
        //     'kel_jog' => 'required',
        //     'domisiljog' => 'required',
        //     'email' => 'required',
        //     'nohp' => 'required',
        //     'img_c1' => 'required',
        //     'img_ktp' => 'required'      
        // ]);
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
            'jk' => $request->jk,
            'nik' => $request->nik,
            'prov' => $request->provinsi,
            'kab' => $request->kabukot,
            'kec' => $request->kecamatan,
            'kel' => $request->kecamatan,
            'dis' => $request->disabil,
            'alasan' => $request->alasan,
            'kec_jog' => $request->kec_jog,
            'kel_jog' => $request->kel_jog,
            'alamat' => $request->domisiljog,
            'email' => $request->email,
            'No_hp' => $request->nohp,
            'img_c1' => $finalc1,
            'img_ktp' => $finalktp
            
        ]);
        $SuratM->save();
        Tps::where('id', $request->get('tps_jog'))->increment('jml_masuk');
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
        // $this->validate($request, [
        //     'tps_jog' => 'required',
        //     'kec_jog' => 'required',
        //     'nokk' => 'required',
        //     'nik' => 'required',
        //     'nama' => 'required',
        //     'jk' => 'required',
        //     'provinsi' => 'required',
        //     'kabukot' => 'required',
        //     'kecamatan' => 'required',
        //     'kel' => 'required',
        //     'alamatjog' => 'required',
        //     'email' => 'required',
        //     'nohp' => 'required',
        //     'img_c1' => 'required',
        //     'img_ktp' => 'required'      
        // ]);
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
            'jk' => $request->jk,
            'nik' => $request->nik,
            'prov' => $request->provinsi,
            'kab' => $request->kabukot,
            'kec' => $request->kecamatan,
            'kel' => $request->kel,
            'kel_jog' => $request->kel_jog,
            'alamat' => $request->alamatjog,
            'email' => $request->email,
            'No_hp' => $request->nohp,
            'img_c1' => $finalc1,
            'img_ktp' => $finalktp
            
        ]);
        $SuratK->save();
        Tps::where('id', $request->get('tps_jog'))->increment('jml_keluar');
        return redirect()->route('InputSK');
    }

    public function tpsadm()
    {
        $tps=Tps::all();
        $kec=Kecamatan::where('kabkot','=', 3471)->get();
        $sumkec=array();
        foreach ($kec as $kc) {
            $kel=Keldes::where('kecamatan','=', $kc->id)->get();
            $sumMAll=0;
            $sumKAll=0;
            foreach ($kel as $kl) {
                $sumM=0;
                $sumK=0;
                $tps1=Tps::where('lokasi','=', $kl->id)->get();
                foreach ($tps1 as $row1) {
                    $sumM=$sumM+$row1->jml_masuk;
                    $sumK=$sumK+$row1->jml_keluar;
                }
                $sumMAll=$sumMAll+$sumM;
                $sumKAll=$sumKAll+$sumK;
            }
            array_push($sumkec,['sumM'=> $sumMAll,'sumK'=> $sumKAll]);
        }
        

        foreach ($tps as $row) {
            $sumM=$sumM+$row->jml_masuk;
            $sumK=$sumK+$row->jml_keluar;
            
        }
        return view('/layouts/Admin/tpsadmin',compact('tps','kec','sumM','sumK','sumkec'));
    }

    public function profiladm()
    {
        return view('/layouts/Admin/ProfilAdm');
    }

    public function setting()
    {
        return view('/layouts/Admin/Setting');
    }

    public function detailSM($id)
    {
        $sm=SuratM::where([
            ['id','=',$id]
        ])->first();
        $prov=Prov::where([
            ['id','=',$sm->prov]
        ])->value('nama');
        $kab=KabKot::where([
            ['id','=',$sm->kab]
        ])->value('nama');
        $kec=Kecamatan::where([
            ['id','=',$sm->kec]
        ])->value('nama');
        $kel=Keldes::where([
            ['id','=',$sm->kel]
        ])->value('nama');
        $kabj=KabKot::where([
            ['id','=','3471']
        ])->value('nama');
        $kecj=Kecamatan::where([
            ['id','=',$sm->kec_jog]
        ])->value('nama');
        $kelj=Keldes::where([
            ['id','=',$sm->kel_jog]
        ])->value('nama');
        $det = [
            "prov" => $prov,
            "kab" => $kab,
            "kec" => $kec,
            "kel" => $kel,
            "kabj" => $kabj,
            "kecj" => $kecj,
            "kelj" => $kelj,
        ];
        
        return view('/layouts/Admin/DetailSM',compact('sm','det'));
    }

    public function detailSK($id)
    {
        $sk=SuratK::where([
            ['id','=',$id]
        ])->first();
        $prov=Prov::where([
            ['id','=',$sk->prov]
        ])->value('nama');
        $kab=KabKot::where([
            ['id','=',$sk->kab]
        ])->value('nama');
        $kec=Kecamatan::where([
            ['id','=',$sk->kec]
        ])->value('nama');
        $kel=Keldes::where([
            ['id','=',$sk->kel]
        ])->value('nama');
        $kabj=KabKot::where([
            ['id','=','3471']
        ])->value('nama');
        $kecj=Kecamatan::where([
            ['id','=',$sk->kec_jog]
        ])->value('nama');
        $kelj=Keldes::where([
            ['id','=',$sk->kel_jog]
        ])->value('nama');
        $det = [
            "prov" => $prov,
            "kab" => $kab,
            "kec" => $kec,
            "kel" => $kel,
            "kabj" => $kabj,
            "kecj" => $kecj,
            "kelj" => $kelj,
        ];
        return $sk->kec;
        return view('/layouts/Admin/DetailSK',compact('sk','det'));
    }

    public function inputTPS()
    {
        return view('/layouts/Admin/InputTPS');
    }

    public function hisMasuk()
    {
        return view('/layouts/Admin/HisMasuk');
    }

    public function hisKeluar()
    {
        return view('/layouts/Admin/HisKeluar');
    }

    public function kuotaTPS()
    {
        $tps=Tps::where('lokasi','=', $request->input('kel_jog'))->get();
        $kec=Kecamatan::where([
            ['id','=',$request->kec_jog]
        ])->value('nama');
        $kel=Keldes::where([
            ['id','=',$request->kel_jog]
        ])->value('nama');
        $det=[
            "kec" => $kec,
            "kel" => $kel,
        ];
        $sumM=0;
        $sumK=0;
        foreach ($tps as $row) {
            $sumM=$sumM+$row->jml_masuk;
            $sumK=$sumK+$row->jml_keluar;
            
        }
        return view('/layouts/Admin/KuotaTPS',compact('tps','det','sumM','sumK'));
    }
}

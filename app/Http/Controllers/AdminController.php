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
use App\Models\User;
use App\Mail\Diterima;
use App\Mail\Ditolak;
use App\Imports\TpsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Mail;
use Auth;
use PDF;
use Hash;

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

    public function pilihansm()
    {
        $kec=Kecamatan::where('kabkot','=', 3471)->get();
        return view('/layouts/Admin/pilihansm',compact('kec'));
    }
    public function editpengajuan($id)
    {
        $kec=Kecamatan::where('kabkot','=', 3471)->get();
        return view('/layouts/Admin/editpengajuan',compact('kec','id'));
    }
    public function index1(Request $request)
    {
        $lok=Auth::user()->lokasi;
        $role=Auth::user()->role;
        $kec=Kecamatan::where('kabkot','=', 3471)->get();
        if($role==1){
            $list=SuratM::where([
                ['status','=',0],
                ['kel_jog','=',$request->kel_jog]
            ])->paginate(10);
            $tps=Tps::where([
                ['lokasi','=',$request->kel_jog]
            ])->get();
            }else{
                if(strlen($lok)==7){
                    $list=SuratM::where([
                        ['status','=',0],
                        ['kec_jog','=',$lok]
                    ])->paginate(10);
                    $tps=Tps::all()->first();
                }elseif(strlen($lok)==10) {
                    $list=SuratM::where([
                        ['status','=',0],
                        ['kel_jog','=',$lok]
                    ])->paginate(10);
                    $tps=Tps::where([
                        ['lokasi','=',$lok]
                    ])->get();
                }
        }
        return view('/layouts/Admin/SuratMasuk',compact('list','tps','kec','role','lok'));
    }
    public function verif(Request $request)
    {
        $id=Auth::user()->id;
        if($request->get('type')=="0"){
            $this->validate($request, [
                'tps_jog' => 'required'
                     
            ]);
            SuratM::where('id', $request->get('id'))->update(['status' => 3 ,'penerima' => $id , 'tps_jog' => $request->get('tps_jog')]);
           
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
            ])->paginate(10);

            }else{
                if(strlen($lok)==7){
                    $list=SuratK::where([
                        ['status','=',0],
                        ['kec_jog','=',$lok]
                    ])->paginate(10);
                    }elseif(strlen($lok)==10) {
                        $list=SuratK::where([
                            ['status','=',0],
                            ['kel_jog','=',$lok]
                        ])->paginate(10);
                    }
        }
        return view('/layouts/Admin/SuratKeluar',compact('list'));
    }

    public function verifK(Request $request)
    {
        $id=Auth::user()->id;
        
        if($request->get('type')=="0"){
            SuratK::where('id', $request->get('id'))->update(['status' => 3 ,'penerima' => $id]);
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
            'jk' => 'required',
            'provinsi' => 'required',
            'kabukot' => 'required',
            'kecamatan' => 'required',
            'kel' => 'required',
            'alasan' => 'required',
            'kel_jog' => 'required',
            'domisiljog' => 'required',
            'email' => 'required',
            'nohp' => 'required',
            'img_c1' => 'required',
            'img_ktp' => 'required'      
        ]);
            $fullname = $request->file('img_c1')->getClientOriginalName();
            $extn =$request->file('img_c1')->getClientOriginalExtension();
            $finalc1= $request->nik.'_'.'C1'.'_'.time().'.'.$extn;
            $path = $request->file('img_c1')->storeAs('public/c1', $finalc1);

            $fullname = $request->file('img_ktp')->getClientOriginalName();
            $extn =$request->file('img_ktp')->getClientOriginalExtension();
            $finalktp= $request->nik.'_'.'KTP'.'_'.time().'.'.$extn;

            $path = $request->file('img_ktp')->storeAs('public/ktp', $finalktp);

        $SuratM= new SuratM([
            'status' => 3,
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
            'kel' => $request->kel,
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
            'jk' => 'required',
            'provinsi' => 'required',
            'kabukot' => 'required',
            'kecamatan' => 'required',
            'kel' => 'required',
            'alamatjog' => 'required',
            'email' => 'required',
            'nohp' => 'required',
            'img_c1' => 'required',
            'img_ktp' => 'required'      
        ]);
            $fullname = $request->file('img_c1')->getClientOriginalName();
            $extn =$request->file('img_c1')->getClientOriginalExtension();
            $finalc1= $request->nik.'_'.'C1'.'_'.time().'.'.$extn;
            $path = $request->file('img_c1')->storeAs('public/c1', $finalc1);

            $fullname = $request->file('img_ktp')->getClientOriginalName();
            $extn =$request->file('img_ktp')->getClientOriginalExtension();
            $finalktp= $request->nik.'_'.'KTP'.'_'.time().'.'.$extn;

            $path = $request->file('img_ktp')->storeAs('public/ktp', $finalktp);

        $SuratK= new SuratK([
            'status' => 3,
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
        // Tps::where('id', $request->get('tps_jog'))->increment('jml_keluar');
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
        $id=Auth::user();
        if(strlen($id->lokasi)==7){
            $lk=Kecamatan::where([
                ['id','=',$id->lokasi]
            ])->value('nama');
            }elseif(strlen($id->lokasi)==10) {
                $lk=Keldes::where([
                    ['id','=',$id->lokasi]
                ])->value('nama');
            }else{
                $lk='Kota Yogyakarta';
            }
        return view('/layouts/Admin/ProfilAdm',compact('id','lk'));
    }

    public function setting()
    {
        $user=User::where('id','>',1)->paginate(10);
        $kec=Kecamatan::where('kabkot','=', 3471)->get();
        return view('/layouts/Admin/Setting',compact('kec','user'));
    }
    public function saveAdmin(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required',
            'pass' => 'required',
            'role' => 'required',
            'kec_jog' => 'required'  
        ]);
        if ($request->kel_jog != null) {
            $user= new User([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->pass),
                'role' => $request->role,
                'lokasi' => $request->kel_jog
            ]);
        }
        else {
            $user= new User([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->pass),
                'role' => $request->role,
                'lokasi' => $request->kec_jog
            ]);
        }
        $user->save();
        return redirect()->route('Setting');
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
        //return $sk->kec;
        return view('/layouts/Admin/DetailSK',compact('sk','det'));
    }

    public function inputTPS()
    {
        $kec=Kecamatan::where('kabkot','=', 3471)->get();
        return view('/layouts/Admin/InputTPS',compact('kec'));
    }

    public function hisMasuk()
    {
        $lok=Auth::user()->lokasi;
        $role=Auth::user()->role;
        $tps=Tps::all();
        if($role==1){
            $list=SuratM::where([
                ['status','!=',0]
            ])->paginate(10);

            }else{
                if(strlen($lok)==7){
                    $list=SuratM::where([
                        ['status','!=',0],
                        ['kec_jog','=',$lok]
                    ])->paginate(10);
                }elseif(strlen($lok)==10) {
                    $list=SuratM::where([
                        ['status','!=',0],
                        ['kel_jog','=',$lok]
                    ])->paginate(10);
                }
        }
        return view('/layouts/Admin/HisMasuk',compact('list','tps'));
    }

    public function hisKeluar()
    {
        $lok=Auth::user()->lokasi;
        $tps=Tps::all();
        if($lok==null){
            $list=SuratK::where([
                ['status','!=',0]
            ])->paginate(10);

            }else{
                if(strlen($lok)==7){
                    $list=SuratK::where([
                        ['status','!=',0],
                        ['kec_jog','=',$lok]
                    ])->paginate(10);
                    }elseif(strlen($lok)==10) {
                        $list=SuratK::where([
                            ['status','!=',0],
                            ['kel_jog','=',$lok]
                        ])->paginate(10);
                    }
        }
        return view('/layouts/Admin/HisKeluar',compact('list','tps'));
    }

    public function fuMasuk()
    {
        $lok=Auth::user()->lokasi;
        $role=Auth::user()->role;
        $tps=Tps::all();
        if($lok==null){
            $list=SuratM::where([
                ['status','=',3]
            ])->paginate(10);

            }else{
                if(strlen($lok)==7){
                    $list=SuratM::where([
                        ['status','=',3],
                        ['kec_jog','=',$lok]
                    ])->paginate(10);
                }elseif(strlen($lok)==10) {
                    $list=SuratM::where([
                        ['status','=',3],
                        ['kel_jog','=',$lok]
                    ])->paginate(10);
                }
        }
        return view('/layouts/Admin/FUMasuk',compact('list','tps'));
    }

    public function fuKeluar()
    {
        $lok=Auth::user()->lokasi;
        $role=Auth::user()->role;
        $tps=Tps::all();
        if($lok==null){
            $list=SuratK::where([
                ['status','=',3]
            ])->paginate(10);

            }else{
                if(strlen($lok)==7){
                    $list=SuratK::where([
                        ['status','=',3],
                        ['kec_jog','=',$lok]
                    ])->paginate(10);
                }elseif(strlen($lok)==10) {
                    $list=SuratK::where([
                        ['status','=',3],
                        ['kel_jog','=',$lok]
                    ])->paginate(10);
                }
        }
        return view('/layouts/Admin/FUKeluar',compact('list','tps'));
    }

    public function kuotaTPS(Request $request)
    {
        $tps=Tps::where('lokasi','=', $request->input('kel_jog'))->paginate(10);
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
    public function printpdf($id)
    {
        $data=SuratM::where([
            ['id','=',$id]
        ])->first();
        $tps_jog=Tps::where([
            ['id','=',$data->tps_jog]
        ])->value('nama');
        $keldes=Keldes::where([
            ['id','=',$data->kel]
        ])->value('nama');
        $kel_jog=Keldes::where([
            ['id','=',$data->kel_jog]
        ])->value('nama');
        $kec=Kecamatan::where([
            ['id','=',$data->kec]
        ])->value('nama');
        $kec_jog=Kecamatan::where([
            ['id','=',$data->kec_jog]
        ])->value('nama');
        $kabkot=KabKot::where([
            ['id','=',$data->kab]
        ])->value('nama');
        $prov=Prov::where([
            ['id','=',$data->prov]
        ])->value('nama');
        $domisili=array();
        array_push($domisili,['keldes'=> $keldes,'kec'=> $kec,'kabkot'=> $kabkot,'prov'=> $prov,'kec_jog'=> $kec_jog,'kel_jog'=> $kel_jog,'tps_jog'=> $tps_jog]);
        
        if ($data->kab==3471) {
            $priv=array(1,1,1,1,1);
        }elseif ($data->prov==34) {
            $priv=array(1,1,1,1,0);
        }else{
            $priv=array(0,0,1,0,0);
        }
        $pdf = PDF::loadview('/layouts/Admin/formPrint',compact('data','domisili','priv'))->setpaper('Legal','potrait');
        //return date("Y-m-d");
        return $pdf->stream($data->nik.'_pindahMasuk');
    }
    public function printpdfK($id)
    {
        $data=SuratK::where([
            ['id','=',$id]
        ])->first();
        $tps_jog=Tps::where([
            ['id','=',$data->tps_jog]
        ])->value('nama');
        $keldes=Keldes::where([
            ['id','=',$data->kel]
        ])->value('nama');
        $kel_jog=Keldes::where([
            ['id','=',$data->kel_jog]
        ])->value('nama');
        $kec=Kecamatan::where([
            ['id','=',$data->kec]
        ])->value('nama');
        $kec_jog=Kecamatan::where([
            ['id','=',$data->kec_jog]
        ])->value('nama');
        $kabkot=KabKot::where([
            ['id','=',$data->kab]
        ])->value('nama');
        $prov=Prov::where([
            ['id','=',$data->prov]
        ])->value('nama');
        $domisili=array();
        array_push($domisili,['keldes'=> $keldes,'kec'=> $kec,'kabkot'=> $kabkot,'prov'=> $prov,'kec_jog'=> $kec_jog,'kel_jog'=> $kel_jog,'tps_jog'=> $tps_jog]);
        
        if ($data->kab==3471) {
            $priv=array(1,1,1,1,0);
        }elseif ($data->prov==34) {
            $priv=array(1,1,1,0,0);
        }else{
            $priv=array(0,0,1,0,0);
        }
        $pdf = PDF::loadview('/layouts/Admin/formPrint',compact('data','domisili','priv'))->setpaper('Legal','potrait');
        //return date("Y-m-d");
        return $pdf->stream($data->nik.'_pindahKeluar');
    }
    public function verifFuMasuk(Request $request)
    {
        $this->validate($request, [
                'pdfsurat' => 'required'      
            ]);
        $fullname = $request->file('pdfsurat')->getClientOriginalName();
            $extn =$request->file('pdfsurat')->getClientOriginalExtension();
            $final= 'pdfsurat'.'_'.time().'.'.$extn;
            $path = $request->file('pdfsurat')->storeAs('public/suratFu', $final);
        SuratM::where('id', $request->get('id'))->update(['status' => 1,'surat_acc' => $final]);
        $tps=SuratM::where('id', $request->get('id'))->value('tps_jog');
        Tps::where('id', $tps)->increment('jml_masuk');
        Mail::to(SuratM::where('id', $request->get('id'))->value('email'))->send(new Diterima());
        return redirect()->route('FUMasuk');
    }
    public function verifFuKeluar(Request $request)
    {
        $this->validate($request, [
            'pdfsurat' => 'required'      
        ]);
        $fullname = $request->file('pdfsurat')->getClientOriginalName();
            $extn =$request->file('pdfsurat')->getClientOriginalExtension();
            $final= 'pdfsurat'.'_'.time().'.'.$extn;

            $path = $request->file('pdfsurat')->storeAs('public/suratFu', $final);
        SuratK::where('id', $request->get('id'))->update(['status' => 1,'surat_acc' => $final]);
        $tps=SuratK::where('id', $request->get('id'))->value('tps_jog');
        Tps::where('id', $tps)->increment('jml_keluar');
        Mail::to(SuratK::where('id', $request->get('id'))->value('email'))->send(new Diterima());
        return redirect()->route('FUKeluar');
    }
    public function savetps(Request $request)
    {
        $this->validate($request, [
            'kec_jog' => 'required',
            'kel_jog' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'koordinat' => 'required',
            'jml' => 'required',
            'pres' => 'required'  
        ]);

        $tps= new Tps([
            'lokasi' => $request->kel_jog,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'koordinat' => $request->koordinat,
            'jml_p_tetap' => $request->jml,
            'presentase' => $request->pres
            
        ]);
        $tps->save();
        return redirect()->route('InputTPS');
    }
    public function editTPS($id)
    {
        $kec=Kecamatan::where('kabkot','=', 3471)->get();
        $tps=Tps::where('id','=', $id)->first();
        return view('/layouts/Admin/editTPS',compact('kec','tps'));
    }
    public function savetpsEdit(Request $request)
    {
        Tps::where('id', $request->get('id'))->update([
            'nama' => $request->get('nama'),
            'alamat' => $request->get('alamat'),
            'koordinat' => $request->get('koordinat'),
            'jml_p_tetap' => $request->get('jml'),
            'presentase' => $request->get('pres')  
        ]);
        return redirect()->route('tpsadmin');
    }
    public function delTPS($id)
    {
        Tps::where('id', $id)->delete();
        return redirect()->route('tpsadmin');
    }
    public function importtps(Request $request) 
    {
        $tps = $request->file('excel');
        Excel::import(new TpsImport, $tps);
        
        return redirect()->route('tpsadmin');
    }
    public function deladmin($id)
    {
        User::where('id', $id)->delete();
        return redirect()->route('Setting');
    }
    public function saveeditpengajuan(Request $request)
    {
        SuratM::where('id', $request->get('id'))->update([
            'kel_jog' => $request->get('kel_jog'),
            'kec_jog' => $request->get('kec_jog') 
        ]);
        return redirect()->route('DetailSM',['id' => $request->get('id')]);
    }
}

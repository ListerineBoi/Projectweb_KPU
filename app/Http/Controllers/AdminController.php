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
        $role=Auth::user()->role;
        $tps=Tps::all();
        if($role==1){
            $list=SuratM::where([
                ['status','=',0]
            ])->get();

            }else{
       
        $list=SuratM::where([
            ['status','=',0],
            ['kec_jog','=',$lok]
        ])->get();
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
        }else{
            SuratM::where('id', $request->get('id'))->update(['status' => 2 ,'penerima' => $id]);
            
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
       
        $list=SuratK::where([
            ['status','=',0],
            ['kec_jog','=',$lok]
        ])->get();
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
        }else{
            SuratK::where('id', $request->get('id'))->update(['status' => 2 ]);
        }
        return redirect()->route('SuratKeluar');
    }


    public function ism()
    {
        $tps=Tps::all();
        $kec=Kecamatan::all();
        $kel = array (
            array("id"=>"1", "nama"=>"Bausasran"),
            array("id"=>"1", "nama"=>"Tegal Panggung"),
            array("id"=>"1", "nama"=>"Suryatmajan"),
            array("id"=>"2", "nama"=>"Sosromenduran"),
            array("id"=>"2", "nama"=>"Pringgokusuman"),
            array("id"=>"3", "nama"=>"Demangan"),
            array("id"=>"3", "nama"=>"Klitren"),
            array("id"=>"3", "nama"=>"Terban"),
            array("id"=>"3", "nama"=>"Kotabaru"),
            array("id"=>"3", "nama"=>"Baciro"),
            array("id"=>"4", "nama"=>"Prawirodirjan"),
            array("id"=>"4", "nama"=>"Ngupasan"),
            array("id"=>"5", "nama"=>"Bumijo"),
            array("id"=>"5", "nama"=>"Gowongan"),
            array("id"=>"5", "nama"=>"Cokrodiningratan"),
            array("id"=>"6", "nama"=>"Rejowinangun"),
            array("id"=>"6", "nama"=>"Prenggan"),
            array("id"=>"6", "nama"=>"Purbayan"),
            array("id"=>"7", "nama"=>"Panembahan"),
            array("id"=>"7", "nama"=>"Kadipaten"),
            array("id"=>"7", "nama"=>"Patehan"),
            array("id"=>"8", "nama"=>"Suryodiningratan"),
            array("id"=>"8", "nama"=>"Gedongkiwo"),
            array("id"=>"8", "nama"=>"Mantrijeron"),
            array("id"=>"9", "nama"=>"Wirogunan"),
            array("id"=>"9", "nama"=>"Keparakan"),
            array("id"=>"9", "nama"=>"Brontokusuman"),
            array("id"=>"10", "nama"=>"Ngampilan"),
            array("id"=>"10", "nama"=>"Notoprajan"),
            array("id"=>"11", "nama"=>"Gunung Ketur"),
            array("id"=>"11", "nama"=>"Purwo Kinanti"),
            array("id"=>"12", "nama"=>"Karangwaru"),
            array("id"=>"12", "nama"=>"Kricak"),
            array("id"=>"12", "nama"=>"Bener"),
            array("id"=>"12", "nama"=>"Tegalrejo"),
            array("id"=>"14", "nama"=>"Pandeyan"),
            array("id"=>"14", "nama"=>"Sorosutan"),
            array("id"=>"14", "nama"=>"Giwangan"),
            array("id"=>"14", "nama"=>"Warungboto"),
            array("id"=>"14", "nama"=>"Muja Muju"),
            array("id"=>"14", "nama"=>"Semaki"),
            array("id"=>"14", "nama"=>"Tahunan"),
            array("id"=>"15", "nama"=>"Patangpuluhan"),
            array("id"=>"15", "nama"=>"Wirobrajan"),
            array("id"=>"15", "nama"=>"Pakuncen"),
            
          );
        return view('/layouts/Admin/InputSM',compact('tps','kec','kel'));
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
        $tps=Tps::all();
        $kec=Kecamatan::all();
        $kel = array (
            array("id"=>"1", "nama"=>"Bausasran"),
            array("id"=>"1", "nama"=>"Tegal Panggung"),
            array("id"=>"1", "nama"=>"Suryatmajan"),
            array("id"=>"2", "nama"=>"Sosromenduran"),
            array("id"=>"2", "nama"=>"Pringgokusuman"),
            array("id"=>"3", "nama"=>"Demangan"),
            array("id"=>"3", "nama"=>"Klitren"),
            array("id"=>"3", "nama"=>"Terban"),
            array("id"=>"3", "nama"=>"Kotabaru"),
            array("id"=>"3", "nama"=>"Baciro"),
            array("id"=>"4", "nama"=>"Prawirodirjan"),
            array("id"=>"4", "nama"=>"Ngupasan"),
            array("id"=>"5", "nama"=>"Bumijo"),
            array("id"=>"5", "nama"=>"Gowongan"),
            array("id"=>"5", "nama"=>"Cokrodiningratan"),
            array("id"=>"6", "nama"=>"Rejowinangun"),
            array("id"=>"6", "nama"=>"Prenggan"),
            array("id"=>"6", "nama"=>"Purbayan"),
            array("id"=>"7", "nama"=>"Panembahan"),
            array("id"=>"7", "nama"=>"Kadipaten"),
            array("id"=>"7", "nama"=>"Patehan"),
            array("id"=>"8", "nama"=>"Suryodiningratan"),
            array("id"=>"8", "nama"=>"Gedongkiwo"),
            array("id"=>"8", "nama"=>"Mantrijeron"),
            array("id"=>"9", "nama"=>"Wirogunan"),
            array("id"=>"9", "nama"=>"Keparakan"),
            array("id"=>"9", "nama"=>"Brontokusuman"),
            array("id"=>"10", "nama"=>"Ngampilan"),
            array("id"=>"10", "nama"=>"Notoprajan"),
            array("id"=>"11", "nama"=>"Gunung Ketur"),
            array("id"=>"11", "nama"=>"Purwo Kinanti"),
            array("id"=>"12", "nama"=>"Karangwaru"),
            array("id"=>"12", "nama"=>"Kricak"),
            array("id"=>"12", "nama"=>"Bener"),
            array("id"=>"12", "nama"=>"Tegalrejo"),
            array("id"=>"14", "nama"=>"Pandeyan"),
            array("id"=>"14", "nama"=>"Sorosutan"),
            array("id"=>"14", "nama"=>"Giwangan"),
            array("id"=>"14", "nama"=>"Warungboto"),
            array("id"=>"14", "nama"=>"Muja Muju"),
            array("id"=>"14", "nama"=>"Semaki"),
            array("id"=>"14", "nama"=>"Tahunan"),
            array("id"=>"15", "nama"=>"Patangpuluhan"),
            array("id"=>"15", "nama"=>"Wirobrajan"),
            array("id"=>"15", "nama"=>"Pakuncen"),
            
          );
        return view('/layouts/Admin/InputSK',compact('tps','kec','kel'));
    }

    public function saveIsk(Request $request)
    {
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
            'penerima' => $request->penerima,
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

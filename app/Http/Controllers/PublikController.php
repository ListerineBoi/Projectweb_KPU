<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratM;
use App\Models\SuratK;
use App\Models\Kecamatan;
use App\Models\Tps;

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
        return view('/layouts/Publik/SMPublik',compact('kec','kel'));
         // return $kec;
    }

    public function skpub()
    {
        $kec=Kecamatan::all();
        $tps=Tps::all();
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
        return view('/layouts/Publik/SKPublik',compact('kec','kel','tps'));
    }

    public function tps()
    {
        $tps=Tps::all();
        return view('/layouts/Publik/tps',compact('tps'));
    }

    public function tcp()
    {
        return view('/layouts/Publik/TCP');
    }

    public function savePengajuan(Request $request)
    {
        $this->validate($request, [
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
            'kec_jog' => $request->kec_jog,
            'no_kk' => $request->nokk,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'prov' => $request->provinsi,
            'kab' => $request->kabukot,
            'kec' => $request->kecamatan,
            'dis' => $request->disabil,
            'alasan' => $request->alasan,
            'kel_jog' => $request->kel_jog,
            'email' => $request->email,
            'No_hp' => $request->nohp,
            'img_c1' => $finalc1,
            'img_ktp' => $finalktp,
            'status' => 0
            
        ]);
        $SuratM->save();
        return redirect()->route('SMPublik');
       
    }

    public function savePengajuanK(Request $request)
    {
        $this->validate($request, [
            'kec_jog' => 'required',
            'nokk' => 'required',
            'nik' => 'required',
            'nama' => 'required',
            'tps_jog' => 'required',
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
            'kec_jog' => $request->kec_jog,
            'no_kk' => $request->nokk,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'tps_jog' => $request->tps_jog,
            'prov' => $request->provinsi,
            'kab' => $request->kabukot,
            'kec' => $request->kecamatan,
            'kel_jog' => $request->kel_jog,
            'email' => $request->email,
            'No_hp' => $request->nohp,
            'img_c1' => $finalc1,
            'img_ktp' => $finalktp,
            'status' => 0
            
        ]);
        $SuratK->save();
        return redirect()->route('SKPublik');
       
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratM;
use App\Models\SuratK;
use App\Models\Kecamatan;
use App\Models\Tps;
use App\Models\KabKot;
use App\Models\Keldes;
use App\Models\Prov;

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
        $prov=Prov::all();
        $kec=Kecamatan::where('kabkot','=', 3471)->get();
        return view('/layouts/Publik/SMPublik',compact('kec','prov'));
    }

    public function skpub()
    {
        $prov=Prov::all();
        $kec=Kecamatan::where('kabkot','=', 3471)->get();
        return view('/layouts/Publik/SKPublik',compact('kec','prov'));
    }

    public function tps()
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
        //return $sumkec;
        return view('/layouts/Publik/tps',compact('tps','kec','sumM','sumK','sumkec'));
    }

    public function tcp()
    {
        return view('/layouts/Publik/TCP');
    }

    public function kuotaTPSPub(Request $request)
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
        return view('/layouts/Publik/KuotaTPSPub',compact('tps','det','sumM','sumK'));
    }

    public function savePengajuan(Request $request)
    {
        $this->validate($request, [
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
            'kec_jog' => $request->kec_jog,
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
            'kel_jog' => $request->kel_jog,
            'alamat' => $request->domisiljog,
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
            'jk' => 'required',
            'tps_jog' => 'required',
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
            'kec_jog' => $request->kec_jog,
            'no_kk' => $request->nokk,
            'nama' => $request->nama,
            'jk' => $request->jk,
            'nik' => $request->nik,
            'tps_jog' => $request->tps_jog,
            'prov' => $request->provinsi,
            'kab' => $request->kabukot,
            'kec' => $request->kecamatan,
            'kel' => $request->kel,
            'kel_jog' => $request->kel_jog,
            'alamat' => $request->alamatjog,
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

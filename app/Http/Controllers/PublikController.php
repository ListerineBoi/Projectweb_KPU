<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratM;
use App\Models\SuratK;
use App\Models\Kecamatan;

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
        return view('/layouts/Publik/SMPublik');
    }

    public function skpub()
    {
        $kec=Kecamatan::all();
        return view('/layouts/Publik/SKPublik');
    }

    public function tps()
    {
        return view('/layouts/Publik/tps');
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
            'email' => $request->email,
            'No_hp' => $request->nohp,
            'img_c1' => $finalc1,
            'img_ktp' => $finalktp
            
        ]);
        $SuratM->save();
        return redirect()->route('SMPublik');
       
    }

    public function savePengajuanK(Request $request)
    {
        // $this->validate($request, [
        //     'kec_jog' => 'required',
        //     'nokk' => 'required',
        //     'nik' => 'required',
        //     'nama' => 'required',
        //     'provinsi' => 'required',
        //     'kabukot' => 'required',
        //     'kecamatan' => 'required',
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
            'kec_jog' => $request->kec_jog,
            'no_kk' => $request->nokk,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'prov' => $request->provinsi,
            'kab' => $request->kabukot,
            'kec' => $request->kecamatan,
            'email' => $request->email,
            'No_hp' => $request->nohp,
            'img_c1' => $finalc1,
            'img_ktp' => $finalktp
            
        ]);
        $SuratK->save();
        return redirect()->route('SKPublik');
       
    }
}

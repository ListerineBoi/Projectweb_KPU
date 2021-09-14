<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratM;

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
        return view('/layouts/Publik/SMPublik');
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
            'nokk' => 'required',
            'nik' => 'required',
            'nama' => 'required',
            'provinsi' => 'required',
            'kabukot' => 'required',
            'kecamatan' => 'required',
            'keldes' => 'required',
            'tps' => 'required',
            'disabil' => 'required',
            'alasan' => 'required',
            'kabukot_jog' => 'required',
            'kecamatan_jog' => 'required',
            'keldes_jog' => 'required',
            'rw' => 'required',
            'rt' => 'required',
            'email' => 'required',
            'nohp' => 'required',
            'img' => 'required'      
        ]);
            $fullname = $request->file('img')->getClientOriginalName();
           
            $extn =$request->file('img')->getClientOriginalExtension();
            $final= $request->nik.'_'.time().'.'.$extn;

            //$path = $request->file('img')->storeAs('public/homestay', $final);

        $SuratM= new SuratM([
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
            'kab_jog' => $request->kabukot_jog,
            'kec_jog' => $request->kecamatan_jog,
            'kel_jog' => $request->keldes_jog,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'email' => $request->email,
            'No_hp' => $request->nohp,
            'img' => $final
            
        ]);
        $SuratM->save();
        return redirect()->route('homePublik');
       
    }
}

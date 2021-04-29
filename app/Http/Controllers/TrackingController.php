<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Tracking;
use Auth;
class TrackingController extends Controller
{

    public function detail($id)
    {
        $tracking = Tracking::where('transaksi_id',$id)->orderBy('id','desc')->get();

        return response($tracking)->json();
    }
    public function jemput($id)
    {
        $tracking = Tracking::findOrFail($id);
        $tracking->proses = 'jemput';
        $tracking->update();

        session()->flash('success','Sukses mengubah data');
        return redirect()->route('transaksi.jemput');
    }
    public function cuci($id)
    {
        $tracking = Tracking::findOrFail($id);
        $tracking->proses = 'cuci';
        $tracking->update();

        session()->flash('success','Sukses mengubah data');
        return redirect()->route('transaksi.cuci');
    }
    public function setrika($id)
    {
        $tracking = Tracking::findOrFail($id);
        $tracking->proses = 'setrika';
        $tracking->update();

        session()->flash('success','Sukses mengubah data');
        return redirect()->route('transaksi.setrika');
    }
    public function kirim($id)
    {
        $tracking = Tracking::findOrFail($id);
        $tracking->proses = 'kirim';
        $transaksi = Transaksi::findOrFail($tracking->transaksi_id);
        $transaksi->proses = 'selesai';
        $transaksi->update();
        $tracking->update();

        session()->flash('success','Sukses mengubah data');
        return redirect()->route('transaksi.kirim');
    }
}

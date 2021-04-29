<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Tracking;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Level;
use Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;
class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $transaksis = Transaksi::where('id','LIKE',"%$search%")->orderBy('id','desc')->paginate(10);
        $proses='all';
        return view('transaksi.index', compact(['transaksis','proses']));
    }
    public function pesan(Request $request)
    {
        $search = $request->get('search');
        $transaksis = Transaksi::where('transaksis.id','LIKE',"%$search%")->where('trackings.proses', 'pesan')->join('trackings', 'trackings.transaksi_id', '=', 'transaksis.id')->orderBy('transaksis.id','desc')->paginate(10);
        $proses='pesan';
        // return $transaksis;
        return view('transaksi.index', compact(['transaksis','proses']));
    }
    public function jemput(Request $request)
    {
        $search = $request->get('search');
        $transaksis = Transaksi::where('transaksis.id','LIKE',"%$search%")->join('trackings', 'trackings.transaksi_id', '=', 'transaksis.id')->where('trackings.proses', 'jemput')->orderBy('transaksis.id','desc')->paginate(10);
        $proses='jemput';
        return view('transaksi.index', compact(['transaksis','proses']));
    }
    public function cuci(Request $request)
    {
        $search = $request->get('search');
        $transaksis = Transaksi::where('transaksis.id','LIKE',"%$search%")->join('trackings', 'trackings.transaksi_id', '=', 'transaksis.id')->where('trackings.proses', 'cuci')->orderBy('transaksis.id','desc')->paginate(10);
        $proses='cuci';
        return view('transaksi.index', compact(['transaksis','proses']));
    }
    public function setrika(Request $request)
    {
        $search = $request->get('search');
        Transaksi::where('transaksis.id','LIKE',"%$search%")->join('trackings', 'trackings.transaksi_id', '=', 'transaksis.id')->where('trackings.proses', 'setrika')->orderBy('transaksis.id','desc')->paginate(10);
        $proses='setrika';
        return view('transaksi.index', compact(['transaksis','proses']));
    }
    public function kirim(Request $request)
    {
        $search = $request->get('search');
        $transaksis = Transaksi::where('transaksis.id','LIKE',"%$search%")->join('trackings', 'trackings.transaksi_id', '=', 'transaksis.id')->where('trackings.proses', 'kirim')->orderBy('transaksis.id','desc')->paginate(10);
        $proses='kirim';
        return view('transaksi.index', compact(['transaksis','proses']));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        $roles = Level::all();
        $pelanggans = User::where('level_id',3)->get();
        return view('transaksi.add', compact(['kategoris','pelanggans','roles']));
    }


    public function store(Request $request)
    {

        $request->validate([
            'pelanggan' => 'required',
            'kategori' => 'required',
            
        ]);

            $id = IdGenerator::generate(['table' => 'transaksis','reset_on_prefix_change'=>true,'length' => 20, 'prefix' =>'Detergent-']);
       
        $transaksi = new Transaksi;
        $transaksi->id = $id;
        if (Auth::user()->level_id != 3) {
            $transaksi->karyawan_id = Auth::user()->id;
        }
        $transaksi->pelanggan_id = $request->pelanggan;
        $transaksi->kategori_id = $request->kategori;
        $harga = Kategori::where('id', $request->kategori)->first()->price;
        if(!empty($request->berat)){
            $transaksi->berat_barang = $request->berat;
            $total = $harga * $request->berat;
        }
        if(!empty($request->satuan)){
            $transaksi->satuan_barang = $request->satuan;
            $total = $harga * $request->satuan;
        }
        $transaksi->total_harga = $total;
        $transaksi->status_pembayaran = "belum lunas";
        $transaksi->proses = "belum selesai";
        $transaksi->save();
        $tracking= new Tracking;
        $tracking->transaksi_id = $id;
        $tracking->proses = 'pesan';
        $tracking->save();
        session()->flash('success','Sukses Tambah Data Transaksi '.$transaksi->name);
        return redirect()->route('transaksi.index');
    }


    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $kategoris = Kategori::all();
        return view('.transaksi.edit', compact('transaksi', 'kategoris'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'pelanggan' => 'required',
            'kategori' => 'required',

        ]);

        $transaksi = Transaksi::findOrFail($id);
        if (Auth::user()->level_id != 3) {
            $transaksi->karyawan_id = Auth::user()->id;
        }
        $transaksi->kategori_id = $request->kategori;
        $harga = Kategori::where('id', $request->kategori)->first()->price;
        if(!empty($request->berat)){
            $transaksi->berat_barang = $request->berat;
            $total = $harga * $request->berat;
        }
        if(!empty($request->satuan)){
            $transaksi->satuan_barang = $request->satuan;
            $total = $harga * $request->satuan;
        }
        $transaksi->total_harga = $total;
        $transaksi->update();

        session()->flash('success','Sukses Ubah Data Transaksi '.$transaksi->name);
        return redirect()->route('transaksi.index');
    }


    public function bayar($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->status_pembayaran = 'lunas';
        $transaksi->update();

        session()->flash('success','Sukses membayar');
        return redirect()->route('transaksi.index');

    }
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        session()->flash('success','Sukses Hapus Transaksi!');
        return redirect()->route('transaksi.index');

    }
}

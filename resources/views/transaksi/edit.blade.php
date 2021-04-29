@extends('layouts.app',['breadcumb'=>['icon'=>"pe-7s-magic-wand",'title'=>"Ubah Transaksi","desc"=>"mmengubah data
transaksi"],'sidebar'=>"pengguna-tambah"])
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <form action="{{ route('transaksi.update', $transaksi->id) }}" method="post">
                        @csrf
                        {{-- @method('POST') --}}
                        <div class="form-group row">
                            <label for="pelanggan" class="col-sm-2 col-form-label">Nama Pengguna</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" placeholder="Masukkan nama" readonly
                                    name='nama-pelanggan' id="pelanggan"
                                    value="{{  $transaksi->pelanggan_id.' / '.$transaksi->pelanggan->name }}">
                                <input type="hidden" name="pelanggan" value="{{ $transaksi->pelanggan_id}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kategori" class="col-sm-2 col-form-label">Role</label>
                            <div class="col-sm-10">
                                <select name="kategori" id="kategori" class="form-control">
                                    @foreach($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}" {{$transaksi->kategori_id == $kategori->id ? 'selected' : ''}}>{{ $kategori->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="berat" class="col-sm-2 col-form-label">Berat Barang</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" placeholder="Masukkan berat barang" 
                                    name='berat' id="berat" min="1" value="{{ $transaksi->berat_barang}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="satuan" class="col-sm-2 col-form-label">Satuan Barang</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" placeholder="Masukkan satuan barang" 
                                    name='satuan' id="satuan" min="1" value="{{ $transaksi->satuan_barang}}">
                            </div>
                        </div>
                        <button type="submit" class='btn btn-primary float-right'>Submit</button>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

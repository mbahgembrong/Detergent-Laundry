@extends('layouts.app',($proses == 'all')?['search'=>'true','breadcumb'=>['icon'=>"pe-7s-user",'title'=>"Daftar
Transaksi",'desc'=>"Berikut adalah data seluruh
Transaksi",'create'=>"transaksi"],'sidebar'=>"transaksi-lihat"]:(($proses=='pesan')?['search'=>'true','breadcumb'=>['icon'=>"pe-7s-user",'title'=>"Daftar
Order",'desc'=>"Berikut adalah data seluruh Order",'create'=>"transaksi"],'sidebar'=>"pesan-lihat"]:(($proses ==
"jemput")?['search'=>'true','breadcumb'=>['icon'=>"pe-7s-user",'title'=>"Daftar Pengiriman",'desc'=>"Berikut adalah data
seluruh order yang sedang di jemput"],'sidebar'=>"jemput-lihat"]:(($proses ==
'cuci')?['search'=>'true','breadcumb'=>['icon'=>"pe-7s-user",'title'=>"Daftar Cucian",'desc'=>"Berikut adalah data
seluruh Barang yang sedang di
cuci"],'sidebar'=>"cuci-lihat"]:(($proses=='setrika')?['search'=>'true','breadcumb'=>['icon'=>"pe-7s-user",'title'=>"Daftar
Setrika",'desc'=>"Berikut adalah data seluruh barang yang sedang
disetrika",],'sidebar'=>"setrika-lihat"]:['search'=>'true','breadcumb'=>['icon'=>"pe-7s-user",'title'=>"Daftar
Kirim",'desc'=>"Berikut adalah data seluruh Barang yang sedang dikirim"],'sidebar'=>"kirim-lihat"])))))
@section('content')
@if(session('success'))
<div class="position-fixed top-1 end-0 p-3" style="z-index: 5">
    <div id="myToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive"
        aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                {{session('success')}}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
</div>
@endif
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Karyawan</th>
                            <th>Pelanggan</th>
                            <th>Kategori</th>
                            <th>Berat</th>
                            <th>Satuan</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Proses</th>
                            <th>Aksi</th>
                        </tr>
                        @php
                        $no=1
                        @endphp
                        @foreach($transaksis as $transaksi)
                        @if ($proses == 'all')
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $transaksi->id }}</td>
                            <td>{{ $transaksi->karyawan->name ?? '' }}</td>
                            <td>{{ $transaksi->pelanggan->name }}</td>
                            <td>{{ $transaksi->kategori->name }}</td>
                            <td>{{ $transaksi->berat_barang }}</td>
                            <td>{{ $transaksi->satuan_barang }}</td>
                            <td>{{ $transaksi->total_harga }}</td>
                            <td>{{ $transaksi->status_pembayaran }}</td>
                            <td>{{ $transaksi->proses }}</td>
                            <td>
                                <div class="d-inline-flex">
                                    <a href="{{ route('transaksi.edit', $transaksi->id) }}"
                                        class='btn btn-warning mr-2'>Edit</a>
                                        <form action="{{ route('transaksi.destroy',$transaksi->id) }}"
                                        method="post">
                                        @csrf
                                        {{-- @method('DELETE') --}}
                                        <button type="submit"
                                            {{ Auth::user()->id == $transaksi->karyawan_id ? 'disabled': '' }}
                                            class='btn btn-danger'>Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endif
                        @if ($proses != 'all')
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $transaksi->transaksi_id }}</td>
                            <td>{{ $transaksi->karyawan->name ?? '' }}</td>
                            <td>{{ $transaksi->pelanggan->name }}</td>
                            <td>{{ $transaksi->kategori->name }}</td>
                            <td>{{ $transaksi->berat_barang }}</td>
                            <td>{{ $transaksi->satuan_barang }}</td>
                            <td>{{ $transaksi->total_harga }}</td>
                            <td>{{ $transaksi->status_pembayaran }}</td>
                            <td>{{ $transaksi->proses }}</td>
                            <td>
                                <div class="d-inline-flex">
                                    <a href="{{ route('transaksi.edit', $transaksi->transaksi_id) }}"
                                        class='btn btn-warning mr-2'>Edit</a>
                                    <form action="{{ route('transaksi.destroy',$transaksi->transaksi_id) }}"
                                        method="post">
                                        @csrf
                                        {{-- @method('DELETE') --}}
                                        <button type="submit"
                                            {{ Auth::user()->id == $transaksi->karyawan_id ? 'disabled': '' }}
                                            class='btn btn-danger'>Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                        @forelse($transaksis as $transaksi)
                        @empty
                        <tr>
                            <td colspan="6">Tidak ada data</td>
                        </tr>
                        @endforelse
                    </table>
                </div>
                {{$transaksis->links()}}
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection

@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Daftar kategori</h4>
                    <p class="text-muted m-b-30 font-14">Berikut adalah data seluruh kategori</p>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    @endif
                    <div class="card-actions ">
                        <a class='btn btn-primary float-left' href="{{ route('kategori.create') }}"><i class='ti ti-plus'></i> Tambah kategori</a>
                        <form action="" method="get" class='form-inline float-right mb-3'>
                            <input type="text" class="form-control" placeholder='Cari nama..' name='search'>
                            <button type="submit" class='btn btn-primary ml-2'>Cari</button>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Price</th>
                                <th>Service</th>
                                <th>Aksi</th>
                            </tr>
                            @foreach($kategoris as $kategori)
                            <tr>
                                <td>{{ $kategori->id }}</td>
                                <td>{{ $kategori->price }}</td>
                                <td>{{ $kategori->service }}</td>
                                <td>{{ $kategori->name }}</td>
                                <td>
                                    <div class="d-inline-flex">
                                        <a href="{{ route('kategori.edit', $kategori->id) }}" class='btn btn-warning mr-2'>Edit</a>
                                        <form action="{{ route('kategori.destroy', $kategori->id) }}" method="post">
                                            @csrf
                                            {{-- @method('DELETE') --}}
                                            <button type="submit" class='btn btn-danger'>Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @forelse($kategoris as $kategori)
                            @empty
                            <tr class='text-center'>
                                <td colspan="6">Tidak ada data</td>
                            </tr>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

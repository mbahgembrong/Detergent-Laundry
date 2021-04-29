@extends('layouts.app',['search'=>'true','breadcumb'=>['icon'=>"pe-7s-piggy",'title'=>"Daftar kategori",'desc'=>"Berikut
adalah data seluruh kategori",'create'=>"kategori"],'sidebar'=>"kategori-lihat"])
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
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
                            <td>{{ $kategori->name }}</td>
                            <td>{{ $kategori->price }}</td>
                            <td>{{ $kategori->service }}</td>
                            <td>
                                <div class="d-inline-flex">
                                    <a href="{{ route('kategori.edit', $kategori->id) }}"
                                        class='btn btn-warning mr-2'>Edit</a>
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

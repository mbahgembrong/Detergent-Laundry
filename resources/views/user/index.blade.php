@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">

                    <h4 class="mt-0 header-title">Pengguna</h4>
                    <p class="text-muted m-b-30 font-14">Berikut adalah data seluruh pengguna</p>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    @endif
                    <div class="card-actions ">
                        <a class='btn btn-primary float-left' href="{{ route('pengguna.create') }}"><i class='ti ti-plus'></i> Tambah Pengguna</a>
                        <form action="" method="get" class='form-inline float-right mb-3'>
                            <input type="text" class="form-control" placeholder='Cari nama..' name='search'>
                            <button type="submit" class='btn btn-primary ml-2'>Cari</button>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Telp</th>
                                <th>Alamat</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                            @php
                                $no=1
                            @endphp
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->no_telp }}</td>
                                <td>{{ $user->alamat }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->level->name }}</td>
                                <td>
                                    <div class="d-inline-flex">
                                        <a href="{{ route('pengguna.edit', $user->id) }}" class='btn btn-warning mr-2'>Edit</a>
                                        <form action="{{ route('pengguna.destroy',$user->id) }}" method="post">
                                            @csrf
                                            {{-- @method('DELETE') --}}
                                            <button type="submit"
                                                {{ Auth::User()->id == $user->id ? 'disabled': '' }}
                                                class='btn btn-danger'>Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @forelse($users as $user)
                            @empty
                            <tr>
                                <td colspan="6">Tidak ada data</td>
                            </tr>
                            @endforelse
                        </table>
                    </div>
                    {{$users->links()}}
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

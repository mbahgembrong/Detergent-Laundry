@extends('layouts.app',($level == 'all')?['search'=>'true','breadcumb'=>['icon'=>"pe-7s-user",'title'=>"Daftar User",'desc'=>"Berikut adalah data seluruh User",'create'=>"pengguna"],'sidebar'=>"pengguna-lihat"]:(($level == 'admin')?['search'=>'true','breadcumb'=>['icon'=>"pe-7s-user",'title'=>"Daftar Admin",'desc'=>"Berikut adalah data seluruh Admin",'create'=>"pengguna"],'sidebar'=>"admin-lihat"]:(($level == 'karyawan')?['search'=>'true','breadcumb'=>['icon'=>"pe-7s-user",'title'=>"Daftar karyawan",'desc'=>"Berikut adalah data seluruh karyawan",'create'=>"pengguna"],'sidebar'=>"karyawan-lihat"]:['search'=>'true','breadcumb'=>['icon'=>"pe-7s-user",'title'=>"Daftar pelanggan",'desc'=>"Berikut adalah data seluruh pelanggan",'create'=>"pengguna"],'sidebar'=>"pelanggan-lihat"])))
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
                        @if ($level == 'all')
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->no_telp }}</td>
                            <td>{{ $user->alamat }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->level->name }}</td>
                            <td>
                                <div class="d-inline-flex">
                                    <a href="{{ route('pengguna.edit', $user->id) }}"
                                        class='btn btn-warning mr-2'>Edit</a>
                                    <form action="{{ route('pengguna.destroy',$user->id) }}" method="post">
                                        @csrf
                                        {{-- @method('DELETE') --}}
                                        <button type="submit" {{ Auth::User()->id == $user->id ? 'disabled': '' }}
                                            class='btn btn-danger'>Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endif
                        @if ($level == 'admin' && $user->level_id == 1)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->no_telp }}</td>
                            <td>{{ $user->alamat }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->level->name }}</td>
                            <td>
                                <div class="d-inline-flex">
                                    <a href="{{ route('pengguna.edit', $user->id) }}"
                                        class='btn btn-warning mr-2'>Edit</a>
                                    <form action="{{ route('pengguna.destroy',$user->id) }}" method="post">
                                        @csrf
                                        {{-- @method('DELETE') --}}
                                        <button type="submit" {{ Auth::User()->id == $user->id ? 'disabled': '' }}
                                            class='btn btn-danger'>Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endif
                        @if ($level == 'karyawan' && $user->level_id == 2)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->no_telp }}</td>
                            <td>{{ $user->alamat }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->level->name }}</td>
                            <td>
                                <div class="d-inline-flex">
                                    <a href="{{ route('pengguna.edit', $user->id) }}"
                                        class='btn btn-warning mr-2'>Edit</a>
                                    <form action="{{ route('pengguna.destroy',$user->id) }}" method="post">
                                        @csrf
                                        {{-- @method('DELETE') --}}
                                        <button type="submit" {{ Auth::User()->id == $user->id ? 'disabled': '' }}
                                            class='btn btn-danger'>Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endif
                        @if ($level == 'pelanggan' && $user->level_id == 3)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->no_telp }}</td>
                            <td>{{ $user->alamat }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->level->name }}</td>
                            <td>
                                <div class="d-inline-flex">
                                    <a href="{{ route('pengguna.edit', $user->id) }}"
                                        class='btn btn-warning mr-2'>Edit</a>
                                    <form action="{{ route('pengguna.destroy',$user->id) }}" method="post">
                                        @csrf
                                        {{-- @method('DELETE') --}}
                                        <button type="submit" {{ Auth::User()->id == $user->id ? 'disabled': '' }}
                                            class='btn btn-danger'>Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endif
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
@section('script')
<script>
    $(document).ready(function () {
        $("#myToast").toast('show');
    });

</script>

@endsection

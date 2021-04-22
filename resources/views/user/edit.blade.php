@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">

                    <h4 class="mt-0 mb-4 header-title">Ubah Pengguna</h4>
                    <form action="{{ route('pengguna.update', $user->id) }}" method="post">
                        @csrf
                        {{-- @method('POST') --}}
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nama Pengguna</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" placeholder="Masukkan nama" name='name' id="name" value="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="telp" class="col-sm-2 col-form-label">Telpon Pengguna</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" placeholder="Masukkan nomor telpon" name='telp' id="telp" value="{{ $user->no_telp }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat Pengguna</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" placeholder="Masukkan alamat" name='alamat' id="alamat" value="{{ $user->alamat }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="email" placeholder="Masukkan email" name='email' id="email" value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="paasword" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="password" name='password' name='password' placeholder="Isi jika ingin diubah" id="paasword">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="role" class="col-sm-2 col-form-label">Role</label>
                            <div class="col-sm-10">
                                <select name="role" id="role" class="form-control">
                                    @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{$user->level_id == $role->id ? 'selected' : ''}}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class='btn btn-primary float-right'>Submit</button>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

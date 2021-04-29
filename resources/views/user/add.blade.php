@extends('layouts.app',['breadcumb'=>['icon'=>"pe-7s-magic-wand",'title'=>"Tambah pengguna","desc"=>"tambahkan data
pengguna"],'sidebar'=>"pengguna-tambah"])
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">

                    <h4 class="mt-0 mb-4 header-title">Tambah Pengguna</h4>
                    <form action="{{ route('pengguna.store') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="namae" class="col-sm-2 col-form-label">Nama Pengguna</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" placeholder="Masukkan nama" name='name' id="namae" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="telp" class="col-sm-2 col-form-label">Telpon Pengguna</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" placeholder="Masukkan nomor telpon" name='telp' id="telp" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat Pengguna</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" placeholder="Masukkan alamat" name='alamat' id="alamat" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="email" placeholder="Email" name='email' id="email" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="password" name='password' name='password' id="password">
                            </div>
                        </div>
                        @if (Auth::user()->level_id == 1)
                        <div class="form-group row">
                            <label for="role" class="col-sm-2 col-form-label">Role</label>
                            <div class="col-sm-10">
                                <select name="role" id="role" class="form-control">
                                    @foreach($roles as $role)
                                    <option value="{{$role->id}}" >{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endif
                        <button type="submit" class='btn btn-primary float-right'>Submit</button>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

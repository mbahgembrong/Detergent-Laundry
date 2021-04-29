@extends('layouts.app',['breadcumb'=>['icon'=>"pe-7s-magic-wand",'title'=>"Tambah Transaksi","desc"=>"tambahkan data
transaksi"],'sidebar'=>"transaksi-tambah"])
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <form action="{{ route('transaksi.store') }}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="karyawan" class="col-sm-2 col-form-label">Nama Karyawan</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" readonly name='karyawan' id="karyawan"
                                value="{{ Auth::user()->name}}">
                        </div>
                    </div>
                    {{-- mrenanyakan punya aku atau belum -> vue --}}
                    <div class="form-group row">
                        <label for="pelanggan" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                        <div class="col-sm-10">
                            <input class="form-control typeahead " data-provide="typeahead" type="text"
                                placeholder="Masukkan Nama"
                                name='pelanggan'
                                id="pelanggan">
                        </div>
                    </div>
                    {{--  --}}
                    {{-- <div class="main-card mb-3 ">
                        <div class="card-body">
                            <h5 class="card-title" style="display:inline-block">Collapse</h5>
                            <button type="button" data-toggle="collapse" href="#collapseExample123"
                                class="btn btn-primary" style="display:inline-block">Toggle</button>
                            <div class="collapse" id="collapseExample123">
                                
                                <form method="post" id="create-pengguna" action="javascript:void(0)">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="namae" class="col-sm-2 col-form-label">Nama Pengguna</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="Masukkan nama"
                                                name='name' id="namae">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="telp" class="col-sm-2 col-form-label">Telpon Pengguna</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="Masukkan nomor telpon"
                                                name='telp' id="telp">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-2 col-form-label">Alamat Pengguna</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="Masukkan alamat"
                                                name='alamat' id="alamat">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="email" placeholder="Email" name='email'
                                                id="email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="password" name='password' name='password'
                                                id="password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="role" class="col-sm-2 col-form-label">Role</label>
                                        <div class="col-sm-10">
                                            <select name="role" id="role" class="form-control">
                                                @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <button id="send_form" type="submit"
                                        class='btn btn-primary float-right'>Submit</button>
                                </form>
                            </div>
                        </div>
                        <div class="card-footer">
                                <button type="button" data-toggle="collapse" href="#collapseExample123"
                                    class="btn btn-primary">Toggle</button>
                            </div>
                    </div> --}}
                    {{--  --}}
                    <div class="form-group row">
                        <label for="kategori" class="col-sm-2 col-form-label">kategori</label>
                        <div class="col-sm-10">
                            <select name="kategori" id="kategori" class="form-control">
                                @foreach($kategoris as $kategori)
                                <option value="{{$kategori->id}}">{{ $kategori->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="berat" class="col-sm-2 col-form-label">Berat Barang</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" min="1" placeholder="Masukkan berat barang"
                                name='berat' id="berat">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="satuan" class="col-sm-2 col-form-label">Satuan Barang</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" min="1" placeholder="Masukkan satuan barang"
                                name='satuan' id="satuan">
                        </div>
                    </div>

                    <button type="submit" class='btn btn-primary float-right'>Submit</button>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection
@section('script')
<script>
    jQuery(document).ready(function ($) {

        $('.typeahead').typeahead({
        hint: true,
        highlight: true, /* Enable substring highlighting */
        minLength: 1 /* Specify minimum characters required for showing suggestions */
        },
        {
        name: 'cars',
        source: <? $pelanggans ?>
        });

    //     $('#create-pengguna').on('submit', function (e) {
    //         // e.preventDefault();
    //         // $.ajax({
    //         // type: "POST",
    //         // url: host+'/comment/add',
    //         // data: { name:name, message:message, post_id:postid },
    //         // success: function( msg ) {
    //         // alert( msg );
    //         // }
    //         e.preventDefault();
    //         /*Ajax Request Header setup*/
    //         $.ajaxSetup({
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             }
    //         });

    //         $('#send_form').html('Sending..');

    //         /* Submit form data using ajax*/
    //         $.ajax({
    //             url: "{{ url('pengguna/create-ajax')}}",
    //             method: 'post',
    //             data: $('#create-pengguna').serialize(),
    //             success: function (response) {
    //                 console.log('sukses ajax')
    //                 // //------------------------
    //                 // $('#send_form').html('Submit');
    //                 // $('#res_message').show();
    //                 // $('#res_message').html(response.msg);
    //                 // $('#msg_div').removeClass('d-none');

    //                 // document.getElementById("contact_us").reset();
    //                 // setTimeout(function () {
    //                 //     $('#res_message').hide();
    //                 //     $('#msg_div').hide();
    //                 // }, 10000);
    //                 //--------------------------
    //             }
    //         });
    //     });
    });

</script>
@endsection

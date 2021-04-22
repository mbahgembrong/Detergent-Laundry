@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">

                <h4 class="mt-0 mb-4 header-title">Tambah kategori</h4>
                <form action="{{ route('kategori.store') }}" method="post" enctype='multipart/form-data'>
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <div class="row">
                                <label for="example-text-input" class="col-sm-4 col-form-label">Nama kategori</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" placeholder="Cuci kering" name='name'
                                        id="example-text-input">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <label for="harga" class="col-sm-3 col-form-label">Harga Kategori</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="number" placeholder="3000" name='price'
                                        id="harga">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">

                    </div>
                    <div class="form-group row">
                        <label for="layanan" class="col-sm-2 col-form-label">Jenis Layanan</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="Cuci" name='service'
                                id="layanan">
                        </div>
                    </div>
                    <button type="submit" class='btn btn-primary float-right'>Submit</button>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection

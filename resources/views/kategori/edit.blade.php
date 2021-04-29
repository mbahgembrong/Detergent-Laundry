@extends('layouts.app',['breadcumb'=>['icon'=>"pe-7s-magic-wand",'title'=>"Edit kategori",'desc'=>"Edit Data kategori",],'sidebar'=>"kategori-lihat"])
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">

                    <h4 class="mt-0 mb-4 header-title">Edit kategori</h4>
                    <form action="{{ route('kategori.update', $kategori->id) }}" method="post" enctype='multipart/form-data'>
                        @csrf
                        {{-- @method('PUT') --}}
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <div class="row">
                                    <label for="name" class="col-sm-4 col-form-label">Nama kategori</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" placeholder="cuci kering" name='name' id="name" value="{{ $kategori->name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <label for="harga" class="col-sm-3 col-form-label">Harga kategori</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="number" placeholder="5000" name='price' id="harga" value="{{ $kategori->price }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="service" class="col-sm-2 col-form-label">Jenis kategori</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" placeholder=Cuci" name='service' id="service" value="{{ $kategori->service }}">
                            </div>
                        </div>
                        <button type="submit" class='btn btn-primary float-right'>Submit</button>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

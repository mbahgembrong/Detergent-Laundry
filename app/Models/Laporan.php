<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    // use HasFactory;
    
    protected $table = 'laporans';

    protected $primaryKey = 'id';

    protected $fillable = ['id','karyawan_id','pelanggan_id','kategori_id','berat_barang','satuan_barang','total_harga'];

}

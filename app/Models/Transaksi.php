<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    // use HasFactory;
    
    protected $table = 'transaksis';

    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = ['id','karyawan_id','pelanggan_id','kategori_id','berat_barang','satuan_barang','total_harga'];

    public function tracking()
    {
        return $this->hasMany('App\Models\Tracking');
    }
    public function karyawan()
    {
        return $this->belongsto('App\Models\User','karyawan_id','id');
    }
    public function pelanggan()
    {
        return $this->belongsto('App\Models\User','pelanggan_id','id');
    }
    public function kategori()
    {
        return $this->belongsto('App\Models\Kategori','kategori_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    // use HasFactory;
    
    protected $table = 'trackings';

    protected $primaryKey = 'id';

    protected $fillable = ['id','transaksi_id','proses'];

    public function transaksi()
    {
        return $this->belongsTo('App\Models\Transaksi','transaksi_id');
    }
}

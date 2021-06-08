<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KlasifikasiSurat extends Model
{
    protected $table = 'klasifikasi_surat';
    protected $fillable = ['kode', 'nama'];
    public $timestamps = false;
}

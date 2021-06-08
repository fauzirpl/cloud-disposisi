<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class SuratKeluar extends Model
{
    use SoftDeletes;
    protected $table="surat_keluar";
    protected $fillable = ['nomor_surat','kode_surat','tanggal_surat','tujuan','isi_singkat','berkas_scan'];

    public function klasifikasi_surat(){
        return $this->belongsTo('\App\KlasifikasiSurat', 'kode', 'kode_surat');
    }
    public $timestamps = true;
}

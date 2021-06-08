<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class SuratMasuk extends Model
{
    use SoftDeletes;
    protected $table="surat_masuk";
    protected $fillable = ['tanggal_penerimaan','nomor_surat','kode_surat','tanggal_surat','pengirim','isi_singkat','isi_disposisi','berkas_scan'];

    public function klasifikasi_surat(){
        return $this->belongsTo('\App\KlasifikasiSurat', 'kode', 'kode_surat');
    }
    public $timestamps = true;
}

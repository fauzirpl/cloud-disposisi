<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Disposisi extends Model
{
    use SoftDeletes;
    protected $table="disposisi";
    protected $guarded = [];

    public function surat_masuk(){
        return $this->belongsTo('\App\SuratMasuk', 'surat_masuk_id', 'id');
    }

    public function user(){
        return $this->belongsTo('\App\User', 'user_id', 'id');
    }

    public $timestamps = true;
}

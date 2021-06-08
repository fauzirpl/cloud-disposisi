<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tracking extends Model
{
    use SoftDeletes;
    protected $table="track_disposisi";
    protected $guarded = [];

    public function disposisi(){
        return $this->belongsTo('\App\Disposisi', 'disposisi_id', 'id');
    }

    public $timestamps = true;
}

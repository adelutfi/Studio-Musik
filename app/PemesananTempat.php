<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PemesananTempat extends Model
{
  protected $table = 'pemesanan_tempat';

  protected $guarded = [];

  public $timestamps = false;

  const CREATED_AT = 'di_buat';

  public function studio(){
    return $this->belongsTo(Studio::class,'id_studio', 'id');
  }

  public function penyewa(){
    return $this->belongsTo(Penyewa::class,'id_penyewa', 'id');
  }
}

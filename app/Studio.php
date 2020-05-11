<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    protected $table = 'studio';

    protected $guarded = [];

    public $timestamps = false;

    const CREATED_AT = 'di_buat';
    const UPDATED_AT = 'di_ubah';

    public function ratings(){
      return $this->hasMany(Rating::class,'id_studio','id');
    }

    public function pemilik(){
      return $this->belongsTo(Pemilik::class,'id_pemilik','id');
    }

    public function sewaTempat(){
      return $this->hasMany(SewaTempat::class,'id_studio','id');
    }

}

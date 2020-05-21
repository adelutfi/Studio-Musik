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
      return $this->hasOne(Rating::class,'id_studio','id');
    }

    public function pemilik(){
      return $this->belongsTo(Pemilik::class,'id_pemilik','id');
    }

    public function sewaTempat(){
      return $this->hasOne(SewaTempat::class,'id_studio','id');
    }

    public function sewaAlat(){
      return $this->hasOne(SewaAlat::class,'id_studio','id');
    }

}

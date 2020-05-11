<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SewaTempat extends Model
{
  protected $table = 'sewa_tempat';

  protected $guarded = [];

  public $timestamps = false;

  public function studio(){
    return $this->belongsTo(Studio::class, 'id_studio','id');
  }

}

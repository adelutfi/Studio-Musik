<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SewaAlat extends Model
{
    protected $table = 'sewa_alat';

    protected $guarded = [];

    public $timestamps = false;

    public function studio(){
    return $this->belongsTo(Studio::class, 'id_studio','id');
  }
}

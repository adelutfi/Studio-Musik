<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PemesananAlat extends Model
{
  protected $table = 'pemesanan_alat';

  protected $guarded = [];

  public $timestamps = false;

  const CREATED_AT = 'di_buat';
}

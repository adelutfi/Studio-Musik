<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
  protected $table = 'notifikasi';

  protected $guarded = [];

  public $timestamps = false;

  public $incrementing = false;

  const CREATED_AT = 'di_buat';

}

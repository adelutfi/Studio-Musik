<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';

    protected $guarded = [];

    public $timestamps = false;

    const CREATED_AT = 'di_buat';
    const UPDATED_AT = 'di_ubah';

}

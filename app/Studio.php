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
    
}

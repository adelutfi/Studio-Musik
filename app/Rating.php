<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
  protected $table = 'rating';

  protected $guarded = [];

  public $timestamps = false;

  public $incrementing = false;

  public function studio(){
  	return $this->belongsTo(Studio::class,'id_studio','id');
  }
}
